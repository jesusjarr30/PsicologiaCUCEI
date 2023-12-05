<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Cliente;
use App\Models\Nota;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\confirmarCorreoMailable;
use Illuminate\Support\Facades\Crypt;
use App\Models\Cita;
use Carbon\Carbon;


class AdminMainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('administrador.homeAdmin');
    }
    public function registroUsuarios(){
        return view('administrador.registrarUsuario');
    }
    public function showUsuarios(){
        $Usuarios = Usuario::paginate(10);
        return view('administrador.usuarios',['usuarios'=>$Usuarios]);
    }
    public function showCitas(){

        $citasHoy = Cita::with('cliente', 'usuario')
        ->whereNotNull('usuario_id')
        ->whereDate('fecha', '=', Carbon::today()->toDateString())
        ->get();
        info(Carbon::today()->toDateString());

        // Obtener citas de mañana y posteriores
        $citasMananaEnAdelante = Cita::with('cliente', 'usuario')
        ->whereDate('fecha', '>=', Carbon::tomorrow())
        ->whereNotNull('usuario_id')
        ->get();
        info("regreso de la query");
        info($citasHoy);
        info($citasMananaEnAdelante);

        return view('administrador.verCitas',['citasHoy'=>$citasHoy,'citaPosterior'=>$citasMananaEnAdelante]);
    }
    public function verPacientes(){

        $pacientes = Cliente::paginate(10);

        foreach ($pacientes as $paciente) {
            info('Información del Paciente: ' . json_encode($paciente->toArray()));
        }
        return view('administrador.pacientes',['pacientes'=>$pacientes]);
    }
    public function serch_dataCliente(Request $request){
        $search = $request->search;
        
        $pacientes = Cliente::where(function($query) use ($search){
            $query->where('codigo','like',"%$search%")
            ->orWhere('nombre','like',"%$search%");
        })
        ->paginate(10);

        return view('administrador.pacientes',['pacientes'=>$pacientes]);

    }
    public function serch_dataUsuario(Request $request){
        $search = $request->search;
        
        $Usuarios = Usuario::where(function($query) use ($search){
            $query->where('nombre','like',"%$search%");
        })
        ->paginate(10);

        return view('administrador.usuarios',['usuarios'=>$Usuarios]);

    }

    public function showEstadisticas(){
        $consulta1 = DB::select('SELECT COUNT(*) as count FROM citas');
        $citas = $consulta1[0]->count;
    
        $consulta2 = DB::select('SELECT COUNT(*) as count FROM clientes');
        $pacientes = $consulta2[0]->count;
    
        $consulta3 = DB::select('SELECT COUNT(*) as count FROM usuarios where role="ADMIN"');
        $admin = $consulta3[0]->count;
    
        $consulta4 = DB::select('SELECT COUNT(*) as count FROM usuarios where role="USER"');
        $psicologo = $consulta4[0]->count;
        return view('administrador.estadisticas', compact('citas', 'pacientes', 'admin', 'psicologo'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $nombre= $request->input('nombre');
        $email= $request->input('email');
        $telefono = $request->input('telefono');
        $password = $request->input('password');
        //$password2= $request->input('password2');
        $role=$request->input('role');

        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios',
            'telefono' => 'required|string',
            'role' => 'required|in:USER,ADMIN',
            'password' => 'required|string|min:8|confirmed',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator);
                
        }

        
        $tabla1 = new Usuario();
        $tabla1->nombre = $nombre;
        $tabla1->email = $email;
        $tabla1->telefono = $telefono;
        $tabla1->password = Hash::make($password);
        $tabla1->role =$role;
        $tabla1->activo= false;
        $tabla1->save();
        //mandar el correo de confirmacion a la cue3nta que se registro
        Mail::to($email)->send(new confirmarCorreoMailable($email,$nombre));


        return redirect()->route('registrar')->with('success', '¡El usuario se ha guardado exitosamente! Revise su correo y confirme la cuenta');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $Usuario)
    {
        dd($Usuario);
        return "se elimino el usuario";
    }
    public function EliminarUsuario($id){
        
        $Usuario = Usuario::find($id);
        $Usuario->delete();

        return  back()->with('success', 'Se elimino el usuario con éxito.');
    }
    public function ConfirmarCorreo($correo){
        $user = Usuario::where('correo',$correo)->first();
        if($user){
            $user->activo = true;
            $user->save();
        } else {
            return redirect()->back()->with('error', 'Usuario no encontrado.');
        }
    }
    //metro que confirmara que el usuario dio de alta su cuenta por correo
    public function confirmar(Request $request){
        $valorCampo = $request->input('correo');
        $usuario = Usuario::where('email', $valorCampo)->first();
       
        $usuario->activo= true;
        $usuario->save();
        return ("Usuario confirmado ya puede acceder");

    }
    public function VerNotas($id){

        $cliente = cliente::find($id);
        $notas = Nota::where('cliente_id', $id)->get();

        return view('administrador.pacientes.verNotas',['cliente' => $cliente, 'notas' => $notas]);


    }
    //para editar al paciente
    public function EditarPaciente($id){
        
        $cliente = Cliente::find($id);
        return view('administrador.pacientes.EditarPaciente',['cliente' => $cliente]);
    }

    const FIELDS = ['nombre', 'apellidos', 'codigo', 'correo', 'edad', 'telefono', 'nacimiento'];
    public function ActualizarPaciente(Request $request, $id){
        
        $cliente = Cliente::find($id);
        //dd($cliente, $request);
        foreach (self::FIELDS as $field) {
            if ($request->$field) {
                $cliente->$field = $request->input($field);
                $cliente->save();
            }
        }

        return back()->with('success', 'Se actualizo el paciente con éxito.');
    }
    public function EliminarPaciente($id){
        
        $cliente = Cliente::find($id);
        $cliente->delete();
        
        return  back()->with('success', 'Se elimino el paciente con éxito.');
    }

    public function GuardarNota(Request $request){



        $id= $request->input('pacienteID');
        $cliente = Cliente::find($id);
        $titulo= $request->input('titulo');
        $descripcion = $request->input('descripcion');

        $nota = new Nota();
        $nota->cliente_id = $id;
        $nota->titulo = $titulo;
        $nota->description=$descripcion;
        // Definir reglas de validación
        $reglas = [
            'titulo' => 'required|string|max:150',
            'descripcion' => 'required|string|max:300',
        ];

        // Definir mensajes de error personalizados si es necesario
        $mensajes = [
            'titulo.max' => 'El título no puede tener más de 150 caracteres.',
            'descripcion.max' => 'La descripción no puede tener más de 300 caracteres.',
        ];

        // Validar los datos del formulario
        $validator = Validator::make($request->all(), $reglas, $mensajes);

        // Comprobar si la validación falla
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $nota->save();

        // Resto de la lógica
    
        return back()->with('success', 'Nota creada con éxito.');


    }
    public function clasificacionShow(){

        $clasificar = Cliente::orwhereNull('clasificacion')
                    ->orWhereNull('secciones')//numero de citas
                    ->orderBy('created_at', 'asc') // Orden ascendente, puedes usar 'desc' para descendente
                    ->get();
        return view('administrador.pacientes.clasificacionPaciente',['clasificar'=>$clasificar]);
        //return view('administrador.verCitas',['citasHoy'=>$citasHoy,'citaPosterior'=>$citasMananaEnAdelante]);
    }
    public function ClasificarCli(Request $request){

        $validator = Validator::make($request->all(), [
            'secciones' => 'required',
            'clasificar' => ['required', 'not_in:N/A'],
        ], [
            'secciones.required' => 'El campo Secciones es obligatorio.',
            'clasificar.required' => 'El campo Clasificar es obligatorio.',
            'clasificar.not_in' => 'El campo Clasificar no puede ser N/A.',
        ]);
    
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $cliente = Cliente::findorFail( $request->input('id'));
        
        $cliente->secciones = $request->input('secciones');
        $cliente->clasificacion = $request->input('clasificar');

        $cliente->save();

        return back();

    }
}

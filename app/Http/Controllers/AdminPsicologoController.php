<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\Cliente;
use App\Models\Nota;
use App\Models\Cita;
use App\Models\Usuario;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Validator;


class AdminPsicologoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('layouts.BaseAd');
    }
    public function showCitasPsicologo(){
        return view('psicologo.citasPsicologo');
    }

    public function EditUser(){
        return view('psicologo.EditarUsuario');
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
        //
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
    public function update(Request $request){
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'nombre' => 'string|max:255',
            'telefono' => 'string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator);
        }
        $actualizado = "profile-updated";
        if($user->nombre != $request->input('nombre')){ $user->nombre = $request->input('nombre'); $actualizado .=", nombre";}
        if($user->telefono != $request->input('telefono')){ $user->telefono = $request->input('telefono'); $actualizado .=", telefono";}
        if($request->input('password') != null && $request->input('password_Old') != null){ 
            $validator2 = Validator::make($request->all(), [
                'password' => 'string|min:8|confirmed',
            ]);
            if ($validator2->fails()) {
                return redirect()->back()
                    ->withErrors($validator2);
            }
            
            if (Hash::check($request->input('password_Old'),$user->password ) ){
                $user->password = Hash::make($request->input('password'));
                $actualizado .=", password";
            }else{
                return redirect()->back()->withErrors('No coincide contraseña antigua');
            }
        }
        
        $horario = array(
            'Lun_I'=>$request->input("Lun-horario-Inicio"),
            'Lun_F'=>$request->input("Lun-horario-Final"),
            'Mar_I'=>$request->input("Mar-horario-Inicio"),
            'Mar_F'=>$request->input("Mar-horario-Final"),
            'Mie_I'=>$request->input("Mie-horario-Inicio"),
            'Mie_F'=>$request->input("Mie-horario-Final"),
            'Jue_I'=>$request->input("Jue-horario-Inicio"),
            'Jue_F'=>$request->input("Jue-horario-Final"),
            'Vie_I'=>$request->input("Vie-horario-Inicio"),
            'Vie_F'=>$request->input("Vie-horario-Final"),
            'Sab_I'=>$request->input("Sab-horario-Inicio"),
            'Sab_F'=>$request->input("Sab-horario-Final")
            );
        $horario_json = json_encode($horario);
        $user->horario = $horario_json;
            
        $user->save();
        
        return redirect()->route('EditUser')->with('success', $actualizado);
    }
    public function VerCita(){

        $user = Auth::user()->id;
        info("El id del usaurio con el que me estoy loogeando es el siguient ");
        info($user);

        $citasHoy = Cita::with('cliente', 'usuario')
        ->where('usuario_id', $user)
        ->whereDate('fecha', '=', Carbon::today()->toDateString())
        ->get();
    

        // Obtener citas de mañana y posteriores
        $citasMananaEnAdelante = Cita::with('cliente', 'usuario')
        ->where('usuario_id', $user)
        ->whereDate('fecha', '>=', Carbon::tomorrow())
        
        ->get();
        info("regreso de la query");
        info($citasHoy);
        

        return view('psicologo.VerCita',['citasHoy'=>$citasHoy,'citaPosterior'=>$citasMananaEnAdelante]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function EliminarPaciente($id){
        
        $cliente = Cliente::find($id);
        if(! $cliente) {
            return response()->json([
                'error' => 'No se encontro el pasiente'
            ], 404);
        }
        // Si el pasiente cuenta con cita se comifica el horario y se elimina
        $cita = Cita::where( 'cliente_id', $id);
        if($cita) {
            $cita->update([
                'fecha' => date("Y-m-d", strtotime('1969-12-31')),
            ]);

            $cita->delete();
        }

        $cliente->delete();

        return  back()->with('success', 'Se elimino el paciente con éxito.');
    }
    public function verPacientes(){

        $pacientes = Cliente::paginate(10);

        foreach ($pacientes as $paciente) {
            info('Información del Paciente: ' . json_encode($paciente->toArray()));
        }
        return view('psicologo.pacientes',['pacientes'=>$pacientes]);
    }
    public function serch_dataCliente(Request $request){
        $search = $request->search;
        
        $pacientes = Cliente::where(function($query) use ($search){
            $query->where('codigo','like',"%$search%")
            ->orWhere('nombre','like',"%$search%");
        })
        ->paginate(10);

        return view('psicologo.pacientes',['pacientes'=>$pacientes]);

    }
    public function VerNotas($id){

        $cliente = cliente::find($id);
        $notas = Nota::where('cliente_id', $id)->get();
        return view('psicologo.pacientes.verNotas',['cliente' => $cliente, 'notas' => $notas]);
    }
    public function EditarPaciente($id){
        
        $cliente = Cliente::find($id);
        return view('psicologo.pacientes.EditarPaciente',['cliente' => $cliente]);
    }

    public function AgregarCita($id){
        $user = Auth::user();

        $cliente = Cliente::find($id);
        return view('psicologo.pacientes.AgregarCita',['user'=> $user,'cliente'=>$cliente]);

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
}

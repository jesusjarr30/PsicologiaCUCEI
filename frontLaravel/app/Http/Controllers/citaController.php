<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Comentario;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\CitaRegistradaMailable;
use App\Models\Usuario;
use App\Models\Cita;
use App\Mail\confirmarCorreoMailable;
use App\Mail\DatosCita;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;


class citaController extends Controller
{
    public function boot()
    {
        Validator::extend('valid_birthdate', function ($attribute, $value, $parameters, $validator) {
            // Verificar si la fecha está en el formato correcto y es válida.
            if (!strtotime($value)) {
                return false;
            }
            // Calcular la fecha actual.
            $fechaActual = date('Y-m-d');

            // Verificar si la fecha de nacimiento es anterior a la fecha actual y posterior a 1960-01-01.
            return $value <= $fechaActual && $value >= '1960-01-01';
        });
    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request): RedirectResponse
{
    $request->flash();
    //Aqui se registra la cita de un usuario.
    $nombre = $request->input('nombre');
    $apellidos = $request->input('apellidos');
    $codigo = $request->input('codigo');
    $correo = $request->input('correo');
    $edad = $request->input('edad');
    $telefono = $request->input('telefono');
    $nacimiento = $request->input('nacimiento');
    // Obtener los campos para generar la tabla de comentarios
    $descripcion = $request->input('descripcion');
    $expectativas = $request->input('expectativas');
    $horario = $request->input('horario');

    

    // Validación
    $validator = Validator::make($request->all(), [
        'nombre' => 'required|string|max:255',
        'apellidos' => 'required|string|max:255',
        'codigo' => 'required|numeric',
        'correo' => 'required|email',
        'edad' => 'required|numeric', // Cambia 18 por el valor mínimo requerido
        'telefono' => 'required|numeric',
        'nacimiento' => 'required|date',
        'descripcion' => 'required|string|max:500',
        'expectativas' => 'required|string|max:500',
        'horario' => 'required|string',
    ]);

    if ($validator->fails()) {
         //Si la validación falla, redirige de vuelta con los errores
       return redirect()->back()
           ->withErrors($validator);
    }

    $tabla1 = new Cliente();
    $tabla1->nombre = $nombre;
    $tabla1->apellidos = $apellidos;
    $tabla1->codigo = $codigo;
    $tabla1->correo = $correo;
    $tabla1->edad = $edad;
    $tabla1->telefono = $telefono;
    $tabla1->nacimiento = $nacimiento;
    $tabla1->save();

    $cliente_id = $tabla1->id;

    $tabla2 = new Comentario();
    $tabla2->cliente_id = $cliente_id;
    $tabla2->descripcion = $descripcion;
    $tabla2->expectativas = $expectativas;
    $tabla2->horario = $horario;

    $tabla2->save();
    //obtener el IDd del usuario que se registro
    $tabla2Id = $tabla2->id;

    Mail::to($correo)->send(new CitaRegistradaMailable($correo,$nombre));
    $this -> GenerarCita($tabla2Id,$tabla2->horario,$tabla1->correo);

    return redirect()->route('cita')->with('success', '¡El usuario se ha guardado exitosamente!');
    }

    public function GenerarCita($id,$horario,$email){//
        $horaAComparar = Carbon::parse($horario);
        $LLunes = [];
        $LMartes = [];
        $LMiercoles = [];
        $LJueves = [];
        $LViernes = [];
        $LSabado = [];
        

        $usuariosConHorario = Usuario::whereNotNull('horario')->select('id', 'horario')->get();

        info("Aqui debe de ir los manesje de los usuarios que se registraron");
        info($usuariosConHorario);

        foreach ($usuariosConHorario as &$usuario) {
            // Decodificar el JSON en el campo 'horario' para trabajar con un arreglo asociativo
            $horario = json_decode($usuario['horario'], true);
        
            if( $horaAComparar->between(Carbon::parse($horario['Lun_I']), Carbon::parse($horario['Lun_F'])) ){
                array_push($LLunes, $usuario['id']);
            }
            if( $horaAComparar->between(Carbon::parse($horario['Mar_I']), Carbon::parse($horario['Mar_F'])) ){
                array_push($LMartes, $usuario['id']);
            }
            if( $horaAComparar->between(Carbon::parse($horario['Mie_I']), Carbon::parse($horario['Mie_F'])) ){
                array_push($LMiercoles, $usuario['id']);
            }
            if( $horaAComparar->between(Carbon::parse($horario['Jue_I']), Carbon::parse($horario['Jue_F'])) ){
                array_push($LJueves, $usuario['id']);
            }
            if( $horaAComparar->between(Carbon::parse($horario['Vie_I']), Carbon::parse($horario['Vie_F'])) ){
                array_push($LViernes, $usuario['id']);
            }
            if( $horaAComparar->between(Carbon::parse($horario['Sab_I']), Carbon::parse($horario['Sab_F'])) ){
                array_push($LSabado, $usuario['id']);
            }
            //$usuario['horario'] = json_encode($horario);
        }
        unset($usuario);
        if(empty($LLunes) && empty($LMartes) && empty($LMiercoles) && empty($LJueves) && empty($LViernes) && empty($LSabado)){
            return response()->json(['message' => 'no existe psicolog con esta cita']);
        }
        
        //info($usuariosConHorario);
        //revisar los logs para ver que onda
        info($LLunes);
        info($LMartes);
        info($LMiercoles);
        info($LJueves);
        info($LViernes);
        info($LSabado); 
        $dias=1;
        $hoy = Carbon::now();//obtener el dia de hoy
        $fecha = $hoy->addDays($dias);
        info($fecha);
        $fecha = $fecha->addDays($dias);
        info($fecha);
        $fecha = $fecha->addDays($dias);
        info($fecha);
        $diaSemana = Carbon::parse($fecha)->format('l');
        
        $econtrado = true;
        $idParaCita="";

        while($econtrado){
            $fecha = $fecha->addDays($dias);
            $diaSemana = Carbon::parse($fecha)->format('l');
            info($diaSemana);
            info($fecha);
        //poner todos los dias de la semana 
        if($diaSemana === "Monday"){

            for ($i = 0; $i < count($LLunes); $i++) {
                info("si entro al for");
                $cita = Cita::where('usuario_id', $LLunes[$i])
                ->whereDate('fecha', $fecha->toDateString())
                ->first();

                if($cita  === null){
                    $econtrado=false;
                    $idParaCita=$LLunes[$i];
                    info("entro a null");
                    break;
                    
                }
            }
            
        }

        if($diaSemana === "Tuesday"){

            for ($i = 0; $i < count($LMartes); $i++) {
                info("si entro al for");
                $cita = Cita::where('usuario_id', $LMartes[$i])
                ->whereDate('fecha', $fecha->toDateString())
                ->first();

                if($cita  === null){
                    $econtrado=false;
                    $idParaCita=$LMartes[$i];
                    info("entro a null");
                    break;
                    
                }
            }
            
        }
            

            if($diaSemana === "Wednesday"){

                for ($i = 0; $i < count($LMiercoles); $i++) {
                    info("si entro al for");
                    $cita = Cita::where('usuario_id', $LMiercoles[$i])
                    ->whereDate('fecha', $fecha->toDateString())
                    ->first();

                    if($cita  === null){
                        $econtrado=false;
                        $idParaCita=$LMiercoles[$i];
                        info("entro a null");
                        break;
                        
                    }
                }
                
            }
            if($diaSemana === "Thursday"){

                for ($i = 0; $i < count($LJueves); $i++) {
                    info("si entro al for");
                    $cita = Cita::where('usuario_id', $LJueves[$i])
                    ->whereDate('fecha', $fecha->toDateString())
                    ->first();

                    if($cita  === null){
                        $econtrado=false;
                        $idParaCita=$LJueves[$i];
                        info("entro a null");
                        break;
                        
                    }
                }
                
            }
            if($diaSemana === "Friday"){

                for ($i = 0; $i < count($LViernes); $i++) {
                    info("si entro al for");
                    $cita = Cita::where('usuario_id', $LViernes[$i])
                    ->whereDate('fecha', $fecha->toDateString())
                    ->first();

                    if($cita  === null){
                        $econtrado=false;
                        $idParaCita=$LViernes[$i];
                        info("entro a null");
                        break;
                        
                    }
                }
                
            }
            if($diaSemana === "Saturday"){

                for ($i = 0; $i < count($LSabado); $i++) {
                    info("si entro al for");
                    $cita = Cita::where('usuario_id', $LSabado[$i])
                    ->whereDate('fecha', $fecha->toDateString())
                    ->first();

                    if($cita  === null){
                        $econtrado=false;
                        $idParaCita=$LSabado[$i];
                        info("entro a null");
                        break;
                        
                    }
                }
                
            }
           
            
        }
        info("la informacion para la cita es la siguiente");
        info($idParaCita);
        $fechaCompleta = $fecha->setTime($horaAComparar->hour, $horaAComparar->minute);
        info("fecha ultima");
        info($fechaCompleta);

        $cita = new Cita([
            'cliente_id' => $id,
            'usuario_id' => $idParaCita,
            'fecha' => $fechaCompleta,
            'atendido'=>false,
        ]);
        $cita->save();

        Mail::to($email)->send(new DatosCita($email,$fechaCompleta,$idParaCita));
        

        info("Salio de cita");

        return response()->json(['message' => 'Cita generada correctamente']);
    }
    public function citaManual(Request $request)
    {
        $usuario_id = $request->input('usuario_id');
        $pacinete_id = $request->input('pacinete_id');
        $horario= $request->input('horario');
        info('los datos del post son lo siguientes');
        info($usuario_id);
        info($pacinete_id);
        info($horario);

        $horaAComparar = Carbon::parse($horario);
        $LLunes = [];
        $LMartes = [];
        $LMiercoles = [];
        $LJueves = [];
        $LViernes = [];
        $LSabado = [];
        info($LLunes);
        info($LMartes);
        info($LMiercoles);
        info($LJueves);
        info($LViernes);
        info($LSabado); 

        $dias=1;
        $hoy = Carbon::now();//obtener el dia de hoy
        $fecha = $hoy->addDays($dias);
        info($fecha);
        $fecha = $fecha->addDays($dias);
        info($fecha);
        $fecha = $fecha->addDays($dias);
        info($fecha);
        $diaSemana = Carbon::parse($fecha)->format('l');
        
        $econtrado = true;
        $idParaCita="";

        while($econtrado){
            $fecha = $fecha->addDays($dias);
            $diaSemana = Carbon::parse($fecha)->format('l');
            info($diaSemana);
            info($fecha);
        //poner todos los dias de la semana 
        if($diaSemana === "Monday"){

                $cita = Cita::where('usuario_id', $usuario_id)
                ->whereDate('fecha', $fecha->toDateString())
                ->first();

                if($cita  === null){
                    $econtrado=false;
                    $idParaCita=$usuario_id;
                    info("entro a null");
                    break;
                    
                }
            
            
        }

        if($diaSemana === "Tuesday"){

          
                $cita = Cita::where('usuario_id', $usuario_id)
                ->whereDate('fecha', $fecha->toDateString())
                ->first();

                if($cita  === null){
                    $econtrado=false;
                    $idParaCita=$usuario_id;
                    info("entro a null");
                    break;
                    
                }
            
            
        }
            

            if($diaSemana === "Wednesday"){

                    $cita = Cita::where('usuario_id', $usuario_id)
                    ->whereDate('fecha', $fecha->toDateString())
                    ->first();

                    if($cita  === null){
                        $econtrado=false;
                        $idParaCita=$usuario_id;
                        info("entro a null");
                        break;
                        
                    }
                
                
            }
            if($diaSemana === "Thursday"){

                
                    $cita = Cita::where('usuario_id', $usuario_id)
                    ->whereDate('fecha', $fecha->toDateString())
                    ->first();

                    if($cita  === null){
                        $econtrado=false;
                        $idParaCita=$usuario_id;
                        info("entro a null");
                        break;
                        
                    }
                
                
            }
            if($diaSemana === "Friday"){

                
                    $cita = Cita::where('usuario_id', $usuario_id)
                    ->whereDate('fecha', $fecha->toDateString())
                    ->first();

                    if($cita  === null){
                        $econtrado=false;
                        $idParaCita=$usuario_id;
                        info("entro a null");
                        break;
                        
                    }
                
                
            }
            if($diaSemana === "Saturday"){
                    $cita = Cita::where('usuario_id', $usuario_id)
                    ->whereDate('fecha', $fecha->toDateString())
                    ->first();

                    if($cita  === null){
                        $econtrado=false;
                        $idParaCita=$usuario_id;
                        info("entro a null");
                        break;
                        
                    }
            }
           
            return response()->json(['message' => 'Cita generada correctamente']);
        }
        info("la informacion para la cita es la siguiente");
        info($idParaCita);
        $fechaCompleta = $fecha->setTime($horaAComparar->hour, $horaAComparar->minute);
        info("fecha ultima");
        info($fechaCompleta);

        $cita = new Cita([
            'cliente_id' => $pacinete_id,
            'usuario_id' => $idParaCita,
            'fecha' => $fechaCompleta,
            'atendido'=>false,
        ]);
        $cita->save();

        //Mail::to($email)->send(new DatosCita($email,$fechaCompleta,$idParaCita));
        

        info("Salio de cita");

        
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {
        
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}

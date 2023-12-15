<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Cita;
use App\Models\Usuario;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use App\Mail\confirmarCorreoMailable;
use App\Mail\DatosCita;
use Illuminate\Support\Facades\Mail;
use App\Mail\CitaRegistradaMailable;


class CalendarController extends Controller
{
    public function index($num)
    {
        // citas
        if($num > 3 or $num < 1){
            return back()->withErrors("Consultorio invalido");
        }
        //info('citas index');
        $citas = Cita::with('cliente')
                        //->where('atendido','=',"%0%")
                        ->where('consultorio',$num)
                        ->get();
        //info($citas);
        $eventsCitas = array();
        foreach($citas as $cita) {
            $color = null;
            if($cita->cliente->clasificacion == 'suicidio') {
                $color = '#dc3545';
            }
            if($cita->cliente->clasificacion == 'depresion') {
                $color = '#ffc107';
            }
            if($cita->cliente->clasificacion == 'ansiedad') {
                $color = '#198754';
            }
            if($cita->cliente->clasificacion == 'otros') {
                $color = '#0dcaf0';
            }
            $fechaEnd = date("Y-m-d H:i:s", strtotime($cita->fecha.'+1 hours'));

            // Cargar citas ya asignadas
            $eventsCitas[] = [
                'id'   => $cita->id,
                'cliente_id' => $cita->cliente_id,
                'usuario_id' => $cita->usuario_id,
                'consultorio' => $cita->consultorio,
                'title' => $cita->cliente->nombre .' '. $cita->cliente->apellidos.' - '.($cita->confirmado ? "✓" : "X"),
                'start' => $cita->fecha,
                'end' => $fechaEnd,
                'color' => $color
            ];
        }

        //Psicologos
        $psicologos = Usuario::where('role','USER')
                                ->where('activo',1)
                                ->get();

        // Pasientes pendientes
        $clasificacion  = Cliente::whereNotNull('clasificacion')
                                ->whereNotIn( 'id', Cita::select('cliente_id') )
                                ->orderBy('clasificacion', 'desc')
                                ->orderBy('horario', 'asc') // Orden ascendente, puedes usar 'desc' para descendente
                                ->get();

        info("clasificacion");
        info($clasificacion);
        return view('administrador.calendario', ['eventsCitas' => $eventsCitas,'clasificacion' => $clasificacion, 'psicologos' => $psicologos, 'consultorio' => $num]);
    }

    public function indexPsi($num)
    {
        
        info("indexPsi");
        // citas
        if($num > 3 or $num < 1){
            return back()->withErrors("Consultorio invalido");
        }
        //info('citas index');
        $citas = Cita::with('cliente')
                        ->where('usuario_id',Auth::user()->id)
                        //->where('atendido','=',"%0%")
                        ->where('consultorio',$num)
                        ->get();
        info("citas");
        info($citas);
        $eventsCitas = array();
        foreach($citas as $cita) {
            $color = null;
            if($cita->atendido == 0) {
                $color = '#64748b';
            }else{
                $color = '#ffc107';
            }
            
            $fechaEnd = date("Y-m-d H:i:s", strtotime($cita->fecha.'+1 hours'));
            $eventsCitas[] = [
                'id'   => $cita->id,
                'cliente_id' => $cita->cliente_id,
                'consultorio' => $cita->consultorio,
                'title' => $cita->cliente->nombre .' '. $cita->cliente->apellidos.': '. ($cita->atendido ? "Atendido" : "Sin Atender"),
                'start' => $cita->fecha,
                'end' => $fechaEnd,
                'color' => $color
            ];
        }

        return view('psicologo.calendario', ['eventsCitas' => $eventsCitas, 'consultorio' => $num]);
    }

    public function storeCita(Request $request)
    {
        info("storeCita");

        $cliente = Cliente::where('codigo','like',"%$request->title%")->get();
        
        info("request->consultorio");
        info("$request->consultorio");
        
        $fecha = $request->start_date;
        $hora = date("H:i:s", strtotime( $fecha ));
        info($hora);
        if(date("H:i:s", strtotime( $fecha )) == '00:00:00'){
            $fecha = date("Y-m-d H:i:s", strtotime( $fecha.'+8 hours' ));
        }
        $i = 1;
        while ($i <= $cliente[0]->secciones) {
            $cita = Cita::create([
                'cliente_id' => $cliente[0]->id,
                'consultorio' => $request->consultorio,
                'fecha' => $fecha,
            ]);
            $fecha = date("Y-m-d H:i:s", strtotime( $fecha.'+7 day' ));
            $i++; 
        }
        info($cita );
        info("cita->consultorio");
        info($cita->consultorio);
        $color = null;

        if($cliente[0]->clasificacion == 'suicidio') {
            $color = '#dc3545';
        }
        if($cliente[0]->clasificacion == 'depresion') {
            $color = '#ffc107';
        }
        if($cliente[0]->clasificacion == 'ansiedad') {
            $color = '#198754';
        }
        if($cliente[0]->clasificacion == 'otros') {
            $color = '#0dcaf0';
        }

        

        $fechaEnd = date("Y-m-d H:i:s", strtotime( $request->start_date.'+ 1 hours' ));
        return response()->json([
            'id'   => $cita->id,
            'cliente_id' => $cita->cliente_id,
            'consultorio' => $cita->consultorio,
            'title' => $cliente[0]->codigo,
            'start' => $cita->fecha,
            'end' => $fechaEnd,
            'color' => $color
        ]);
    }

    public function storeCitaNueva(Request $request)
    {
        info("storeCitaNueva");
        // Se busca obtener la ultima cita del pasiente
        $ultimaCita = Cita::where('cliente_id',$request->cliente_id)
        ->orderBy('fecha', 'desc') // Orden ascendente, puedes usar 'desc' para descendente
        ->get();

        info("Fecha de la ultima cita".$ultimaCita);
        $fecha = date("Y-m-d H:i:s", strtotime( $ultimaCita[0]->fecha.'+7 day' )); ;
        $cita = Cita::create([
            'cliente_id' => $request->cliente_id,
            'usuario_id' => $request->usuario_id,
            'consultorio' => $request->consultorio,
            'fecha' => $fecha,
        ]);

        info("Cita nueva".$cita);
        
        $fechaEnd = date("Y-m-d H:i:s", strtotime( $request->start_date.'+ 1 hours' ));
        return response()->json([
            'id'   => $cita->id,
            'cliente_id' => $cita->cliente_id,
            'consultorio' => $cita->consultorio,
            'title' => $cita->codigo,
            'start' => $cita->fecha,
            'end' => $fechaEnd,
            'color' => $request->color
        ]);
    }

    public function updateCita(Request $request ,$id)
    {
        $cita = Cita::find($id);
        if(! $cita) {
            return response()->json([
                'error' => 'Unable to locate the event'
            ], 404);
        }
        $cita->update([
            'fecha' => $request->start_date,
        ]);
        return response()->json('Event updated');
    }

    public function asigPsi(Request $request ,$id)
    {
        $cita = Cita::find($id);

        if(! $cita) {
            return response()->json([
                'error' => 'Error al actualizar cita'
            ], 404);
        }
        $pasiente = Cliente::find($cita->cliente_id);
        $demasCitas = Cita::where('cliente_id', $cita->cliente_id)
                            ->get();

        if(! $pasiente) {
            return response()->json([
                'error' => 'Error al actualizar pasiente'
            ], 404);
        }

        $usuario_id = null;
        if($request->usuario_id != "null")
        {
            $usuario_id = $request->usuario_id;
        }
        info ('usuario_id: '.gettype($usuario_id));
        // Actualiza todas las citas del pasiente
        foreach ($demasCitas as $citaActual){
            $citaActual->update([
                'usuario_id' => $usuario_id,
            ]);
        }
        info($request->usuario_id);
        // Actualiza el pasiente
        $pasiente -> update([
            'usuario_id' => $usuario_id,
        ]);
        
        info('update');
        info($pasiente);
        return response()->json('Event updated');
    }

    public function enviarCorreo($cita_id)
    {
        info("enviarCorreo");
        $cita = Cita::find($cita_id);
        info($cita);

        if(! $cita) {
            return response()->json([
                'error' => 'Error al buscar la cita'
            ], 404);
        }elseif(! $cita->usuario_id){
            return response()->json([
                'psicologo' => 'Error, cita sin Psicologo asignado'
            ], 404);
        }

        $pasiente = Cliente::find($cita->cliente_id);
        if(! $pasiente) {
            return response()->json([
                'error' => 'Error al buscar al pasiente'
            ], 404);
        }

        $email = $pasiente->correo;
        info("Mail - sale");
        Mail::to($email)->send(new DatosCita($email,$cita->fecha,$cita->usuario_id));
        info("Mail - regresa");
        return response()->json('Correo enviado');
    }

    public function destroyCita($id)
    {
        $cita = Cita::find($id);
        if(! $cita) {
            return response()->json([
                'error' => 'Unable to locate the event'
            ], 404);
        }
        $cita->delete();
        return $id;
    }
    public function destroyDemasCitas($id)
    {
        $cita = Cita::find($id);
        if(! $cita) {
            return response()->json([
                'error' => 'No se pudo encontra su cita'
            ], 404);
        }
        $demasCitas = Cita::where("cliente_id",$cita->cliente_id)
                            ->get();
        if(! $demasCitas) {
            return response()->json([
                'error' => 'No se pudo eliminar todas las citas'
            ], 404);
        }

        foreach ($demasCitas as $citaActual){
            $citaActual->delete();
        }
        return $id;
    }
    public function getPasienteCita($id)
    {
        info('getPasienteCita');
        $cita = Cita::with('cliente')
        ->where('id', $id)
        ->get();

        if(! $cita) {
            return response()->json([
                'error' => 'Unable to locate the event'
            ], 404);
        }
        info('Cita del pasiente'.$cita);
        // obtiene todas las citas del pasiente
        $citaActual = Cita::with('cliente')
        ->where('cliente_id',$cita[0]->cliente_id)
        ->get();
        $citaContador = 0;
        $contador = 0;
        foreach ($citaActual as $actual) {
            $contador++;
            if($actual == $cita[0]){
                $citaContador = $contador;
            }
        }
        info("Contador: ".$citaContador);
        $psi = Usuario::find($cita[0]->usuario_id);
        
        if(! $psi) {
            $psiAsignado = 'Sin asignar';
        }
        else{
            $psiAsignado = $psi->nombre;
        }
        info('Info del psicologo asignado'.$psi);
        return response()->json([
            // Info pasiente
            'modal-pasiente'   => $cita[0]->cliente->nombre .' '. $cita[0]->cliente->apellidos,
            'modal-codigo' => $cita[0]->cliente->codigo,
            'modal-correo' => $cita[0]->cliente->correo,
            'modal-edad' => $cita[0]->cliente->edad,
            'modal-telefono' => $cita[0]->cliente->telefono,
            'modal-descripcion' => $cita[0]->cliente->descripcion,
            'modal-expectativa' => $cita[0]->cliente->expectativas,
            'modal-horario' =>  $cita[0]->cliente->horario,
            'modal-clasificacion' =>  $cita[0]->cliente->clasificacion,
            'modal-secciones' => $contador,
            'modal-seccionesRestantes' => $citaContador,
            'modal-nacimiento' => $cita[0]->cliente->nacimiento,
            // Info de la cita
            'modal-fecha' =>  $cita[0]->fecha,
            'modal-consultorio' =>  $cita[0]->consultorio,
            'modal-confirmado' => ($cita[0]->confirmado ? "Confirmado" : "Sin Confirmar"),
            'modal-atendido' => ($cita[0]->atendido ? "Atendido" : "Sin Atender"),
            'modal-psicologo' => $psiAsignado,
        ]);
    }
    public function citaAtendida($id)
    {
        info("citaAtendida");
        $cita = Cita::find($id);
        
        info($cita);
        if(! $cita) {
            return response()->json([
                'error' => 'Unable to locate the event'
            ], 404);
        }
        $cita->update([
            'atendido' => 1,
        ]);
        return response()->json('Event updated');
    }

    public function getPasiente($id)
    {
        info('getPasiente');
        info($id);
        $cliente = Cliente::where('id',$id)
                ->get();

        info($cliente);
        if(! $cliente) {
            return response()->json([
                'error' => 'Unable to locate the event'
            ], 404);
        }
        return response()->json([
            'modal-pasiente-infoPasiente'   => $cliente[0]->nombre .' '. $cliente[0]->apellidos,
            'modal-codigo-infoPasiente' => $cliente[0]->codigo,
            'modal-correo-infoPasiente' => $cliente[0]->correo,
            'modal-edad-infoPasiente' => $cliente[0]->edad,
            'modal-telefono-infoPasiente' => $cliente[0]->telefono,
            'modal-descripcion-infoPasiente' => $cliente[0]->descripcion,
            'modal-expectativa-infoPasiente' => $cliente[0]->expectativas,
            'modal-horario-infoPasiente' =>  $cliente[0]->horario,
            'modal-clasificacion-infoPasiente' =>  $cliente[0]->clasificacion,
            'modal-secciones-infoPasiente' => $cliente[0]->secciones,
            'modal-nacimiento-infoPasiente' => $cliente[0]->nacimiento,
        ]);
    }
}

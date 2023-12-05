<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Cita;
use App\Models\Usuario;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;


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
                        ->where('atendido','=',"%0%")
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
            $eventsCitas[] = [
                'id'   => $cita->id,
                'cliente_id' => $cita->cliente_id,
                'consultorio' => $cita->consultorio,
                'title' => $cita->cliente->codigo,
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
        return view('calendar.index', ['eventsCitas' => $eventsCitas,'clasificacion' => $clasificacion, 'psicologos' => $psicologos, 'consultorio' => $num]);
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
                'atendido' => false,
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

        // Actualiza todas las citas del pasiente
        foreach ($demasCitas as $citaActual){
            $citaActual->update([
                'usuario_id' => $request->usuario_id,
            ]);
        }
        // Actualiza el pasiente
        $pasiente -> update([
            'usuario_id' => $request->usuario_id,
        ]);
        info('update');
        info($pasiente);
        return response()->json('Event updated');
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
    public function getPasienteCita($id)
    {
        info('getPasienteCita');
        info($id);
        $cita = Cita::with('cliente')
        ->where('cliente_id', $id)
        ->get();

        info($cita);
        if(! $cita) {
            return response()->json([
                'error' => 'Unable to locate the event'
            ], 404);
        }

        $psi = Usuario::find($cita[0]->usuario_id);
        
        if(! $psi) {
            $psiAsignado = 'Sin asignar';
        }
        else{
            $psiAsignado = $psi->nombre;
        }
        
        return response()->json([
            'modal-pasiente'   => $cita[0]->cliente->nombre .' '. $cita[0]->cliente->apellidos,
            'modal-codigo' => $cita[0]->cliente->codigo,
            'modal-correo' => $cita[0]->cliente->correo,
            'modal-edad' => $cita[0]->cliente->edad,
            'modal-telefono' => $cita[0]->cliente->telefono,
            'modal-descripcion' => $cita[0]->cliente->descripcion,
            'modal-expectativa' => $cita[0]->cliente->expectativas,
            'modal-horario' =>  $cita[0]->cliente->horario,
            'modal-consultorio' =>  $cita[0]->consultorio,
            'modal-clasificacion' =>  $cita[0]->cliente->clasificacion,
            'modal-secciones' => $cita[0]->cliente->secciones,
            'modal-nacimiento' => $cita[0]->cliente->nacimiento,
            'modal-psicologo' => $psiAsignado,
        ]);
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

<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Cita;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;


class CalendarController extends Controller
{
    public function index()
    {
    // citas
        //info('citas index');
        $citas = Cita::with('cliente')
                        ->where('atendido','=',"%0%")
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
                'title' => $cita->cliente->codigo,
                'start' => $cita->fecha,
                'end' => $fechaEnd,
                'color' => $color
            ];
        }

        $clasificacion  = Cliente::whereNotNull('clasificacion')
                                ->whereNotIn( 'id', Cita::select('cliente_id') )
                                ->orderBy('clasificacion', 'desc')
                                ->orderBy('horario', 'asc') // Orden ascendente, puedes usar 'desc' para descendente
                                ->get();

        return view('calendar.index', ['eventsCitas' => $eventsCitas,'clasificacion' => $clasificacion]);
    }

    public function storeCita(Request $request)
    {
        $request->validate([
            'title' => 'required|string'
        ]);

        $cliente = Cliente::where('codigo','like',"%$request->title%")->get();
        
        if( $cliente->count() == 0){
            throw ValidationException::withMessages(['title' => 'No se encontro el paciente con el codigo']);
        }
            
        $cita = Cita::create([
            'cliente_id' => $cliente[0]->id,
            'fecha' => $request->start_date,
            'atendido' => false,
        ]);

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
}

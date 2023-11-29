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
                'descripcion' => $cita->cliente->descripcion,
                'start' => $cita->fecha,
                'end' => $fechaEnd,
                'color' => $color
            ];
        }

        $clasiDepresion = Cliente::where('clasificacion', '=', 'depresion')
                                ->whereNotIn( 'id', Cita::select('cliente_id') )->get();

        $clasiAnsiedad = Cliente::where('clasificacion', '=', 'ansiedad')
                                ->whereNotIn( 'id', Cita::select('cliente_id') )->get();

        $clasiSuicidio = Cliente::where('clasificacion', '=', 'suicidio')
                                ->whereNotIn( 'id', Cita::select('cliente_id') )->get();

        $clasiOtros = Cliente::where('clasificacion', '=', 'otros')
                                ->whereNotIn( 'id', Cita::select('cliente_id') )->get();

    // Bookings
        $events = array();
        $bookings = Booking::all();
        foreach($bookings as $booking) {
            $color = null;

            if($booking->title == 'suicidio') {
                $color = '#dc3545';
            }
            if($booking->title == 'depresion') {
                $color = '#ffc107';
            }
            if($booking->title == 'ansiedad') {
                $color = '#198754';
            }
            if($booking->title == 'otros') {
                $color = '#0dcaf0';
            }

            $events[] = [
                'id'   => $booking->id,
                'title' => $booking->title,
                'start' => $booking->start_date,
                'end' => $booking->end_date,
                'color' => $color
            ];
        }

        
    return view('calendar.index', ['events' => $events,'eventsCitas' => $eventsCitas, 'clasiDepresion'=> $clasiDepresion,'clasiAnsiedad'=> $clasiAnsiedad,'clasiSuicidio'=> $clasiSuicidio,'clasiOtros'=> $clasiOtros]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string'
        ]);

        $booking = Booking::create([
            'title' => $request->title,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        $color = null;

        if($booking->title == 'suicidio') {
            $color = '#dc3545';
        }
        if($booking->title == 'depresion') {
            $color = '#ffc107';
        }
        if($booking->title == 'ansiedad') {
            $color = '#198754';
        }
        if($booking->title == 'otros') {
            $color = '#0dcaf0';
        }

        return response()->json([
            'id' => $booking->id,
            'start' => $booking->start_date,
            'end' => $booking->end_date,
            'title' => $booking->title,
            'color' => $color ? $color: '',

        ]);
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
            'descripcion' => $cliente[0]->descripcion,
            'start' => $cita->fecha,
            'end' => $fechaEnd,
            'color' => $color
        ]);
    }
    public function update(Request $request ,$id)
    {
        $booking = Booking::find($id);
        if(! $booking) {
            return response()->json([
                'error' => 'Unable to locate the event'
            ], 404);
        }
        $booking->update([
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);
        return response()->json('Event updated');
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
    public function destroy($id)
    {
        $booking = Booking::find($id);
        if(! $booking) {
            return response()->json([
                'error' => 'Unable to locate the event'
            ], 404);
        }
        $booking->delete();
        return $id;
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

<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Cita;


class CalendarController extends Controller
{
    public function index()
    {
        $events = array();
        $citas = Cita::with('cliente')
                        ->orwhereNull('atendido')
                        ->get();

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

            $events[] = [
                'id'   => $cita->id,
                'title' => $cita->title,
                'start' => $cita->start_date,
                'end' => $cita->end_date,
                'color' => $color
            ];
        }

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

        $clasiDepresion = Cliente::where('clasificacion', '=', 'depresion')
                    ->orderBy('created_at', 'asc') // Orden ascendente, puedes usar 'desc' para descendente
                    ->get();
        $clasiAnsiedad = Cliente::where('clasificacion', '=', 'ansiedad')
                    ->orderBy('created_at', 'asc') // Orden ascendente, puedes usar 'desc' para descendente
                    ->get();
        $clasiSuicidio = Cliente::where('clasificacion', '=', 'suicidio')
                    ->orderBy('created_at', 'asc') // Orden ascendente, puedes usar 'desc' para descendente
                    ->get();
        $clasiOtros = Cliente::where('clasificacion', '=', 'otros')
                    ->orderBy('created_at', 'asc') // Orden ascendente, puedes usar 'desc' para descendente
                    ->get();
                
        return view('calendar.index', ['events' => $events, 'clasiDepresion'=> $clasiDepresion,'clasiAnsiedad'=> $clasiAnsiedad,'clasiSuicidio'=> $clasiSuicidio,'clasiOtros'=> $clasiOtros]);
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
}

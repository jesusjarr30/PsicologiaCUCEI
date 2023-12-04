<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Cita;

use Barryvdh\DomPDF\Facade\Pdf;


class PdfController extends Controller
{
    //metodo para obtener un reporte de todos las citas regitradas 
    public function generatePDF()
    {
        $data = [
            'title' => 'Mi primer PDF desde Laravel',
            'content' => 'Hola, esto es un ejemplo de contenido para el PDF.',
        ];

        $pdf = PDF::loadView('PDF.prueba', $data);//donse esta el archivo

        return $pdf->download('Reporte.pdf');//como se llama el archivo al descaragar
    }

    //Reporte de la semana 
    //dar los detalles de la cita
    public function pdfSemana(){

        //obtener el dia de hoy
        //$hoy = Carbon::now();

        $fechaInicioSemana = Carbon::now()->startOfWeek(); 
    // Obtener la fecha de fin de la semana (sábado)
        $fechaFinSemana = Carbon::now()->endOfWeek();
        $citas = Cita::select(
            'citas.id',
            'usuarios.nombre as nombre_usuario',
            'clientes.nombre as nombre_cliente',
            'citas.consultorio',
            'citas.fecha',
        )
        ->join('usuarios', 'citas.usuario_id', '=', 'usuarios.id')
        ->join('clientes', 'citas.cliente_id', '=', 'clientes.id')
        ->whereBetween('citas.fecha', [$fechaInicioSemana, $fechaFinSemana])
        ->orderByRaw('citas.fecha, FIELD(citas.consultorio, 1, 2, 3)')
        ->get();
        
        $pdf =PDF::loadView('PDF.reporteSemana',compact('citas'));
        return $pdf->download();

    }
    public function pdfParaMes(){
        $pdf =PDF::loadView('PDF.reporteMes');
        return $pdf->download();

    }
    //todas las citas que han existido
    public function pdfHistorico(){

    }
    
}

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

    //todas las citas que han existido
    public function pdfMes(){
        $fechaInicioSemana = Carbon::now()->startOfMonth(); 
        // Obtener la fecha de fin de la semana (sábado)
            $fechaFinSemana = Carbon::now()->endOfMonth();
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
            
            $pdf =PDF::loadView('PDF.reporteMes',compact('citas'));
            return $pdf->download();
        
    }
    public function pdfHistorico(){
        $citas = Cita::select(
            'citas.id',
            'usuarios.nombre as nombre_usuario',
            'clientes.nombre as nombre_cliente',
            'citas.consultorio',
            'citas.fecha',
        )
        ->join('usuarios', 'citas.usuario_id', '=', 'usuarios.id')
        ->join('clientes', 'citas.cliente_id', '=', 'clientes.id')
        ->orderByRaw('citas.fecha, FIELD(citas.consultorio, 1, 2, 3)')
        ->get();

    
    $pdf =PDF::loadView('PDF.reporteHistorico',compact('citas'));
            return $pdf->download();
            

    }

    public function traducirDiaSemana($diaEnIngles) {
        $diasTraducidos = [
            'Monday' => 'Lunes',
            'Tuesday' => 'Martes',
            'Wednesday' => 'Miércoles',
            'Thursday' => 'Jueves',
            'Friday' => 'Viernes',
            'Saturday' => 'Sábado',
            'Sunday' => 'Domingo',
        ];
    
        return $diasTraducidos[$diaEnIngles] ?? $diaEnIngles;
    }
//aqui esta
public function pdfHorarioConsultorio() {
    $consulta = DB::table('citas')
        ->selectRaw('
            CASE
                WHEN DAYOFWEEK(citas.fecha) = 1 THEN "Domingo"
                WHEN DAYOFWEEK(citas.fecha) = 2 THEN "Lunes"
                WHEN DAYOFWEEK(citas.fecha) = 3 THEN "Martes"
                WHEN DAYOFWEEK(citas.fecha) = 4 THEN "Miércoles"
                WHEN DAYOFWEEK(citas.fecha) = 5 THEN "Jueves"
                WHEN DAYOFWEEK(citas.fecha) = 6 THEN "Viernes"
                WHEN DAYOFWEEK(citas.fecha) = 7 THEN "Sábado"
            END AS DiaSemana,
            citas.fecha,
            citas.atendido,
            usuarios.nombre AS Psicologo,
            citas.consultorio
        ')
        ->join('usuarios', 'citas.usuario_id', '=', 'usuarios.id')
        ->whereRaw('WEEK(citas.fecha) = WEEK(CURDATE())')
        ->orderByRaw('DAYOFWEEK(citas.fecha), usuarios.nombre, citas.consultorio')
        ->get();

    info("Los datos de la consulta son los siguientes");
    
    $resultadosOrganizados = [];

    foreach ($consulta as $fila) {
        // Utilizar el día de la semana como clave del array
        $diaSemana = $fila->DiaSemana;

        // Agregar entrada al array de resultados organizados
        $resultadosOrganizados[$diaSemana][$fila->Psicologo][] = [
            'fecha' => $fila->fecha,
            'atendido' => $fila->atendido,
            'consultorio' => $fila->consultorio,
        ];
    }

    info($resultadosOrganizados);
    
    $pdf = PDF::loadView('PDF.horarioConsultorios', compact('resultadosOrganizados'));
    return $pdf->download();
}

    
  
    public function pdfPsicologoHorario(){
        $consulta = DB::table('citas')
    ->select('usuarios.nombre AS usuario', 'citas.fecha','clientes.nombre AS nombre', 'clientes.apellidos AS apellidos',
    'citas.consultorio')
    ->join('usuarios', 'citas.usuario_id', '=', 'usuarios.id')
    ->join('clientes','cliente_id','=','clientes.id')
    ->whereRaw('YEARWEEK(citas.fecha, 1) = YEARWEEK(CURDATE(), 1)')
    ->orderBy('usuarios.nombre')
    ->orderBy('citas.fecha')
    ->orderBy('citas.fecha', 'ASC') // Cambio para ordenar también por fecha
    ->get();
    

    // Crear un array para organizar los resultados por día y usuario
    $resultadosOrganizados = [];

    foreach ($consulta as $fila) {
        $diaSemana = $this->traducirDiaSemana(date('l', strtotime($fila->fecha)));
    
        // Agregar entrada al array de resultados organizados
        $resultadosOrganizados[$diaSemana][$fila->usuario][] = [
            'hora' => date('H:i:s', strtotime($fila->fecha)), // Obtener la hora directamente de la fecha
            'nombre_cliente' => $fila->nombre,
            'apellidos_cliente' => $fila->apellidos,
            'consultorio'=> $fila->consultorio,
        ];
    }
        info($resultadosOrganizados);
    $pdf =PDF::loadView('PDF.psicologoHorario',compact('resultadosOrganizados'));
    return $pdf->download();
}
    
    
}

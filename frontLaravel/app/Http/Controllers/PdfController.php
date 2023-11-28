<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade\Pdf;


class PdfController extends Controller
{
    public function generatePDF()
    {
        $data = [
            'title' => 'Mi primer PDF desde Laravel',
            'content' => 'Hola, esto es un ejemplo de contenido para el PDF.',
        ];

        $pdf = PDF::loadView('PDF.prueba', $data);//donse esta el archivo

        return $pdf->download('ejemplo.pdf');//como se llama el archivo al descaragar
    }
}

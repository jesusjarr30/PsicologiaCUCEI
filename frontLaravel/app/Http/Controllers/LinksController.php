<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LinksController extends Controller
{
    
    public function acercaDe(){
        return view('Links.acercaDe');
    }
    public function desarrolladores(){
        return view('Links.developers');
    }
    public function servicios(){
        return "aqui va la parte de servicos que se ofrecen";
    }
    public function Registrate(){
        return "Aqui otro link para reg¿dirigir a la cita del paciente";
    }
}

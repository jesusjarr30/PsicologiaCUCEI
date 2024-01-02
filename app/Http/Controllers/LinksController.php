<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class LinksController extends Controller
{
    
    public function acercaDe(){
        $usuarios = Usuario::where('activo',1)->get();

        return view('Links.acercaDe',['usuarios'=>$usuarios]);
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

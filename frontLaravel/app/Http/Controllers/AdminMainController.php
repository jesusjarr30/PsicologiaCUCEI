<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class AdminMainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('layouts.BaseAdmin');
    }
    public function registroUsuarios(){

        
        return view('administrador.registrarUsuario');
    }
    public function showUsuarios(){
        $Usuarios = Usuario::all();


        return view('administrador.usuarios',['usuarios'=>$Usuarios]);
    }
    public function showCitas(){
        return view('administrador.verCitas');
    }
    public function showEstadisticas(){
        return view('administrador.estadisticas');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

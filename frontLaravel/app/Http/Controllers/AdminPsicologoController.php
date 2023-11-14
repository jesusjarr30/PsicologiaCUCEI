<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminPsicologoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('layouts.BaseAd');
    }
    public function showCitasPsicologo(){
        return view('psicologo.citasPsicologo');
    }

    public function EditUser(){
        return view('psicologo.EditarUsuario');
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
    public function update(Request $request){
        $user = Auth::user();
        if($user->nombre != $request->input('nombre')){ $user->nombre = $request->input('nombre');}
        if($user->telefono != $request->input('telefono')){ $user->telefono = $request->input('telefono');}
        if($user->password != $request->input('password') && ($request->input('password') != null )){ $user->password = Hash::make($request->input('password'));}
        
        $horario = array(
            'Lun_I'=>$request->input("Lun-horario-Inicio"),
            'Lun_F'=>$request->input("Lun-horario-Final"),
            'Mar_I'=>$request->input("Mar-horario-Inicio"),
            'Mar_F'=>$request->input("Mar-horario-Final"),
            'Mie_I'=>$request->input("Mie-horario-Inicio"),
            'Mie_F'=>$request->input("Mie-horario-Final"),
            'Jue_I'=>$request->input("Jue-horario-Inicio"),
            'Jue_F'=>$request->input("Jue-horario-Final"),
            'Vie_I'=>$request->input("Vie-horario-Inicio"),
            'Vie_F'=>$request->input("Vie-horario-Final"),
            'Sab_I'=>$request->input("Sab-horario-Inicio"),
            'Sab_F'=>$request->input("Sab-horario-Final")
            );
        $horario_json = json_encode($horario);
        $user->horario = $horario_json;

        $user->save();

        return Redirect::route('EditUser')->with('status', 'profile-updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

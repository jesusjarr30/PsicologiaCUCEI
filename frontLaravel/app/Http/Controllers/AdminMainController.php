<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

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
        $Usuarios = Usuario::paginate(10);


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
        $nombre= $request->input('nombre');
        $email= $request->input('email');
        $telefono = $request->input('telefono');
        $password = $request->input('password');
        //$password2= $request->input('password2');
        $role=$request->input('role');

        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios',
            'telefono' => 'required|string',
            'role' => 'required|in:USER,ADMIN',
            'password' => 'required|string|min:8|confirmed',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator);
                
        }

        
        $tabla1 = new Usuario();
        $tabla1->nombre = $nombre;
        $tabla1->email = $email;
        $tabla1->telefono = $telefono;
        $tabla1->password = Hash::make($password);
        $tabla1->role =$role;
        $tabla1->activo= true;
        $tabla1->save();

        return redirect()->route('registrar')->with('success', '¡El usuario se ha guardado exitosamente!');
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
    public function destroy(string $Usuario)
    {
        dd($Usuario);
        return "se elimino el usuario";
    }
}

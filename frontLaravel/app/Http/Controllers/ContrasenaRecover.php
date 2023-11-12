<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Mail\RecuperarMailable;
use Illuminate\Support\Facades\Mail;
use App\Models\Usuario;

use Illuminate\Http\Request;

class ContrasenaRecover extends Controller
{
    public function index()
    {
        return view('MailMessage.InvitacionRecuperacions');
    }

    public function show($id)
    {
        // Lógica para la acción show con un parámetro $id
    }
    public function create()
    {
        // Lógica para mostrar el formulario de creación
    }
    public function store(Request $request)
    {
        // Lógica para almacenar un nuevo recurso
    }
    public function edit($id)
    {
        // Lógica para mostrar el formulario de edición
    }
    public function update(Request $request, $id)
    {
        // Lógica para actualizar un recurso existente
    }
    public function enviarCorreo(Request $request){

        $email= $request->input('email');

        $elemento= Usuario::where('email',$email)->first();
        info("Correo a enviar: $email");

        if ($elemento) {
            //mandamos el correop al mail y esperamos a que de click en el correo
            Mail::to($email)->send(new RecuperarMailable($email));
            return redirect()->back()->with('success', 'Te hemos enviado un correo para restaurar tu contraseña, favor de revisar.');
            
        } else {
            Session::flash('error','No encontramos tu correo regitrado en la base de datos intenato de nuevo');
            
        }
        return redirect()->back();
        
    }

    public function modificarPass(Request $request){

        $correo= $request->input('correo');

        return view('MailMessages.recuperarForm', ['correo' => $correo]);
    }


    
    public function cambioPass(Request $request){


        $pass1= $request->input('pass1');
        $pass2= $request->input('pass2');
        $correo= $request->input('correo');

        info("Correo: $correo");

        $user = Usuario::where('email',$correo)->first();
        if($user){
            if($pass1 == $pass2){
            $user->password = bcrypt($pass1);
            $user->save();
            return redirect()->back()->with
            ('success', 'Se realizo el cambio de contraseña exitoso, intente ingresar a su cuenta');

            }else{
                return redirect()->back()->with('error', 'las contraseñas no no coinciden intento otra vez.');
            }
            
        
        } else {
            return redirect()->back()->with('error', 'Usuario no encontrado.');
        }
    }
               
    
}

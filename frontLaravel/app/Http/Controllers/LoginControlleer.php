<?php

namespace App\Http\Request;

use App\Http\Controllers\Controller;
use GuzzleHttp\Psr7\Request;

use App\Models\user;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginControlleer extends Controller
{
    public function login(Request $request){
        // Validar los datos

        $credentials = [
            "email" => $request->email,
            "password" => $request->password,
            //"activo" => 1,
        ];

        $remember = ($request->has('remember')? true : false);

        if(Auth::attempt($credentials,$remember)){
            $request->session()->regenerate();

            if($request->role == "ADMIN"){
                return redirect()->intended(route('AdminHome'));
            }else{
                return redirect()->intended(route('showCitasPsicologo'));
            }

        }else{
            return redirect('login');
        }
    }

    public function logout(Request $request){
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route("home"));
    }
}



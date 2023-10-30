<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function __invoke() {
        return view('principal.content');
    }
    public function login(){
        return view('Login.login');
    }
    public function recoverP(){
        return view('Login.recoverPassword');
    }
    
}    

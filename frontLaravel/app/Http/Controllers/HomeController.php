<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('principal.content');
    }

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

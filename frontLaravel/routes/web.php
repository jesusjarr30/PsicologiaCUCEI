<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('principal.content');
});

Route::resource('tasks',TaskController::class);


Route::get('/login',function(){
    return view('Login.login');
});
Route::get('/cita',function() {
    return view('Cita.Agendar');
});

Route::get('/developers',function() {
    return view('Desarrolladores/developers');
});


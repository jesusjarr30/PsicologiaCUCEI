<?php

use App\Http\Controllers\AdminMainController;
use App\Http\Controllers\AdminPsicologoController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LinksController;
use App\Http\Controllers\citaController;
use App\Mail\RecuperarMailable;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Auth;

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


//principal
Route::get('/', HomeController::class)->name("home");
///links para el login 
Route::get('/login',[HomeController::class, 'login'])->name("login");
Route::get('/recoverP', [HomeController::class, 'recoverP'])->name('recoverP');

Route::get('/cita',function() {
    return view('Cita.Agendar');
})->name('cita');

//links part
Route::get('/Links/Developers',[LinksController::class, 'desarrolladores'])->name("des");
Route::get('/Links/AcercaDeNosotros',[LinksController::class, 'acercaDe'])->name("acercaDe");
Route::get('/Links/Servicios',[LinksController::class, 'servicios'])->name('servicios');
Route::get('/Links/Registrate',[LinksController::class, 'registrate'])->name('registrate');

// Admin Menu
Route::get('/Admin',[AdminMainController::class, 'index'])->middleware('auth')->name('AdminHome');
Route::get('Admin/Registrar',[AdminMainController::class,'registroUsuarios'] )->name('registrar');
Route::get('Admin/showUsuarios',[AdminMainController::class,'showUsuarios'] )->name('showUsuario');
Route::get('Admin/Estaditicas',[AdminMainController::class,'showEstadisticas'] )->name('showEstadisticas');
Route::get('Admin/Citas',[AdminMainController::class,'showCitas'] )->name('showCitas');

Route::get('/developers',function() {
    return view('Links.developers');
});

//Psicologo regular menu
Route::get('/Piscologo',[AdminPsicologoController::class, 'showCitasPsicologo'])->middleware('auth')->name('showCitasPsicologo');
Route::get('/Piscologo/EditUser',[AdminPsicologoController::class, 'EditUser'])->name('EditUser');


//beta para revisar las alertas
Route::get('/alerta',function() {
    return view('Alertas.alertas');
})->name('alerta');



//organizar los post
Route::post('/guardar', [CitaController::class, 'store'])->name('guardar-cita');
Route::post('/GuardarUsuario',[AdminMainController::class, 'store'])->name('guardar-usuario');

//Delte
Route::delete('/eliminarRegistro', [AdminMainController::class, 'destroy'])->name('eliminarRegistro');

//Email que se van a enviar

Route::get('confirmacion',function(){
    Mail::to('pruebas@pruebas')->send(new RecuperarMailable());
    return "mensaje enviado";
})->name('confirmacion');


// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');


Auth::routes();
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

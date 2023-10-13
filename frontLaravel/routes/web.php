<?php

use App\Http\Controllers\AdminMainController;
use App\Http\Controllers\AdminPsicologoController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LinksController;
use App\Http\Controllers\citaController;


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
Route::get('/login',[HomeController::class, 'login'])->name("login");

Route::get('/cita',function() {
    return view('Cita.Agendar');
})->name('cita');

//links part
Route::get('/Links/Developers',[LinksController::class, 'desarrolladores'])->name("des");
Route::get('/Links/AcercaDeNosotros',[LinksController::class, 'acercaDe'])->name("acercaDe");
Route::get('/Links/Servicios',[LinksController::class, 'servicios'])->name('servicios');
Route::get('/Links/Registrate',[LinksController::class, 'registrate'])->name('registrate');
//link part login

// Admin Menu
Route::get('/Admin',[AdminMainController::class, 'index'])->name('AdminHome');
Route::get('Admin/Registrar',[AdminMainController::class,'registroUsuarios'] )->name('registrar');
Route::get('Admin/showUsuarios',[AdminMainController::class,'showUsuarios'] )->name('showUsuario');
Route::get('Admin/Estaditicas',[AdminMainController::class,'showEstadisticas'] )->name('showEstadisticas');
Route::get('Admin/Citas',[AdminMainController::class,'showCitas'] )->name('showCitas');

Route::get('/developers',function() {
    return view('Links.developers');
});

//Psicologo regular menu
Route::get('/Piscologo',[AdminPsicologoController::class, 'showCitasPsicologo'])->name('showCitasPsicologo');




//organizar los post
Route::post('/guardar', [CitaController::class, 'store'])->name('guardar-cita');







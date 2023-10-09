<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LinksController;

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
Route::get('/', HomeController::class);
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


Route::get('/developers',function() {
    return view('Links.developers');
});




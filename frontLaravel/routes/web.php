<?php

use App\Http\Controllers\AdminMainController;
use App\Http\Controllers\AdminPsicologoController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LinksController;
use App\Http\Controllers\citaController;
use App\Mail\CitaRegistradaMailable;
use App\Mail\RecuperarMailable;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\ContrasenaRecover;

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

Route::controller(LoginRegisterController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');

    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
});

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
Route::group(['middleware' => ['auth','admin']], function () {
    Route::get('/Admin',[AdminMainController::class, 'index'])->name('AdminHome');
    Route::get('Admin/Registrar',[AdminMainController::class,'registroUsuarios'] )->name('registrar')->withoutMiddleware(['auth','admin']);
    Route::get('Admin/showUsuarios',[AdminMainController::class,'showUsuarios'] )->name('showUsuario')->withoutMiddleware(['auth','admin']);
    Route::get('Admin/Estaditicas',[AdminMainController::class,'showEstadisticas'] )->name('showEstadisticas')->withoutMiddleware(['auth','admin']);
    Route::get('Admin/Citas',[AdminMainController::class,'showCitas'] )->name('showCitas')->withoutMiddleware(['auth','admin']);
    Route::get('Admin/Pacientes',[AdminMainController::class,'verPacientes'] )->name('showPacientes')->withoutMiddleware(['auth','admin']);

});

Route::get('/developers',function() {
    return view('Links.developers');
});

//Psicologo regular menu

Route::group(['middleware' => ['user']], function () {
    Route::get('/Piscologo',[AdminPsicologoController::class, 'showCitasPsicologo'])->name('showCitasPsicologo');
    Route::get('/Piscologo/EditUser',[AdminPsicologoController::class, 'EditUser'])->name('EditUser');
});





//beta para revisar las alertas
Route::get('/alerta',function() {
    return view('Alertas.alertas');
})->name('alerta');



//organizar los post
Route::post('/guardar', [CitaController::class, 'store'])->name('guardar-cita');
Route::post('/GuardarUsuario',[AdminMainController::class, 'store'])->name('guardar-usuario');
Route::post('/ConfirmarUsuario',[AdminMainController::class, 'confirmar'])->name('ConfirmarUsuario');
Route::post('/ContrasenaRecover',[ContrasenaRecover::class, 'enviarCorreo'])->name('inivtacioRecuperar');
Route::get('/ingresarNuevaPass',[ContrasenaRecover::class, 'modificarPass'])->name('ingresarNuevaPass');
Route::post('/cambiarPass',[ContrasenaRecover::class, 'cambioPass'])->name('cambiarPass');


//Delte
Route::delete('/eliminarRegistro', [AdminMainController::class, 'destroy'])->name('eliminarRegistro');

//Email a enviar

//Route::get('/confirmacion',function(){
   // Mail::to('jesus.jarr.30@gmail.com')->send(new CitaRegistradaMailable());
    //return "mensaje enviado";
//})->name('confirmacion');


// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');


Auth::routes();
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//prueba para ver la vista del correo 
Route::get('/CCC',function() {
    return view('MailMessages.RegistroCita',$data =["correo"=>"hola","nombre"=>"jesus"]);
})->name('ccc');

Route::get('/ddd',function() {
    return view('MailMessages.ConfirmarUsuario',$data =["correo"=>"hhhh@hhh.com ","nombre"=>"jesus"]);
})->name('ddd');

Route::get('/aaa',function() {
    return view('MailMessages.InvitacionRecuperacions',$data =["correo"=>"hhhh@hhh.com ","nombre"=>"jesus"]);
})->name('aaa');

Route::get('/ppp',function() {
    return view('MailMessages.recuperarForm',$data =["correo"=>"bb@bb.com ","nombre"=>"jesus"]);
})->name('ppp');


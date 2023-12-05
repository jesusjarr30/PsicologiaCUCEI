<?php

use App\Http\Controllers\AdminMainController;
use App\Http\Controllers\AdminPsicologoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CalendarController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LinksController;
use App\Http\Controllers\citaController;
use App\Mail\CitaRegistradaMailable;
use App\Mail\RecuperarMailable;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\ContrasenaRecover;
use App\Http\Controllers\PdfController;

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

Route::get('books', [BookController::class, 'index'])->name('books.index');
Route::post('books', [BookController::class, 'store'])->name('books.store');

Route::controller(LoginRegisterController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');

    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/puta', 'logout')->name('logout')->middleware(['auth']);
});

Route::get('/recoverP', [HomeController::class, 'recoverP'])->name('recoverP');

//links part
Route::get('/Links/Developers',[LinksController::class, 'desarrolladores'])->name("des");
Route::get('/Links/AcercaDeNosotros',[LinksController::class, 'acercaDe'])->name("acercaDe");
Route::get('/Links/Servicios',[LinksController::class, 'servicios'])->name('servicios');
Route::get('/Links/Registrate',[LinksController::class, 'registrate'])->name('registrate');

Route::get('/cita',function() {
    return view('Cita.Agendar');
})->name('cita');


// Admin Menu
Route::group(['middleware' => ['auth','admin']], function () {

    Route::get('/Admin',[AdminMainController::class, 'index'])->name('AdminHome');
    //Route::get('Admin/cita',function() { return view('administrador.Agendar'); })->name('cita');
    Route::get('Admin/Registrar',[AdminMainController::class,'registroUsuarios'] )->name('registrar');
    Route::get('Admin/showUsuarios',[AdminMainController::class,'showUsuarios'] )->name('showUsuario');
    Route::get('Admin/showUsuarios/searchData',[AdminMainController::class,'serch_dataUsuario'] )->name('searchDataUsuario');
    Route::get('Admin/showUsuarios/eliminar/{id}',[AdminMainController::class,'EliminarUsuario'] )->name('eliminar-Usuario');
    Route::get('Admin/Estaditicas',[AdminMainController::class,'showEstadisticas'] )->name('showEstadisticas');
    Route::get('Admin/Citas',[AdminMainController::class,'showCitas'] )->name('showCitas');
    Route::get('Admin/Pacientes',[AdminMainController::class,'verPacientes'] )->name('showPacientes');
    Route::get('Admin/Pacientes/searchData',[AdminMainController::class,'serch_dataCliente'] )->name('searchDataCliente');
    Route::get('Admin/Pacientes/{id}',[AdminMainController::class,'EditarPaciente'] )->name('showPacienteEditar');
    Route::get('Admin/Pacientes/eliminar/{id}',[AdminMainController::class,'EliminarPaciente'] )->name('eliminar-Paciente');
    Route::get('Admin/Pacientes/VerNotas/{id}',[AdminMainController::class,'VerNotas'] )->name('verNotas');
    Route::get('Admin/Clasificacion',[AdminMainController::class,'clasificacionShow'] )->name('verClasificacion');
    

    Route::put('Admin/Pacientes/EditarPaciente/{id}',[AdminMainController::class,'ActualizarPaciente'] )->name('actualizar-Paciente');

    //Calendario
    //vistas
    Route::get('Admin/calendar/consultorio/{num}', [CalendarController::class, 'index'])->name('calendar.index');
    //modal
    Route::post('Admin/calendar/infoEventPC/{id}', [CalendarController::class, 'getPasienteCita'])->name('calendar.infoPasienteCita');
    Route::post('Admin/calendar/infoEventP/{id}', [CalendarController::class, 'getPasiente'])->name('calendar.infoPasiente');
    //Funciones
    Route::post('Admin/calendar', [CalendarController::class, 'storeCita'])->name('calendar.storeCita');
    Route::patch('Admin/calendar/update/{id}', [CalendarController::class, 'updateCita'])->name('calendar.updateCita');
    Route::patch('Admin/calendar/updatePsi/{id}', [CalendarController::class, 'asigPsi'])->name('calendar.asigPsi');
    Route::delete('Admin/calendar/destroy/{id}', [CalendarController::class, 'destroyCita'])->name('calendar.destroyCita');
    Route::delete('Admin/calendar/destroys/{id}', [CalendarController::class, 'destroyDemasCitas'])->name('calendar.destroyDemasCitas');

});

Route::get('/developers',function() {
    return view('Links.developers');
});

//Psicologo regular menu
Route::group(['middleware' => ['auth','user']], function () {
    Route::get('/Piscologo',[AdminPsicologoController::class, 'showCitasPsicologo'])->name('showCitasPsicologo');
    Route::get('/Piscologo/cita',function() { return view('psicologo.Agendar'); })->name('citaPSI');
    Route::get('/Piscologo/EditUser',[AdminPsicologoController::class, 'EditUser'])->name('EditUser');
    Route::get('/Piscologo/Pacientes',[AdminPsicologoController::class,'verPacientes'] )->name('showPacientesPSI');
    Route::get('/Piscologo/Pacientes/searchData',[AdminPsicologoController::class,'serch_dataCliente'] )->name('searchDataClientePSI');
    Route::get('/Piscologo/Pacientes/{id}',[AdminPsicologoController::class,'EditarPaciente'] )->name('showPacienteEditarPSI');
    Route::get('/Piscologo/Pacientes/eliminar/{id}',[AdminPsicologoController::class,'EliminarPaciente'] )->name('eliminar-PacientePSI');
    Route::get('/Piscologo/Pacientes/VerNotas/{id}',[AdminPsicologoController::class,'VerNotas'] )->name('verNotasPSI');

    Route::get('/Piscologo/Pacientes/AgregarCita/{id}',[AdminPsicologoController::class,'AgregarCita'] )->name('AgregarCita');

    Route::put('/Piscologo/Pacientes/EditarPaciente/{id}',[AdminPsicologoController::class,'ActualizarPaciente'] )->name('actualizar-PacientePSI');

    Route::get('Piscologo/calendar/consultorio/{num}', [CalendarController::class, 'indexPsi'])->name('calendar.indexPsi');
    Route::post('Piscologo/calendar/infoEventPC/{id}', [CalendarController::class, 'getPasienteCita'])->name('calendar.infoPasienteCitaPsi');

    Route::get('/Piscologo/VerCita',[AdminPsicologoController::class,'VerCita'] )->name('verCitaPS');
    
    
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
Route::put('/EditarUsario',[AdminPsicologoController::class, 'update'])->name('editar-usuario');
Route::post('/GuardarNota',[AdminMainController::class, 'GuardarNota'])->name('GuardarNota');
Route::post('/GuardarNota',[AdminMainController::class, 'GuardarNota'])->name('GuardarNota');
Route::put('/clasificarClientes',[AdminMainController::class, 'ClasificarCli'])->name('ClasificarCli');

//Delte
Route::delete('/eliminarRegistro', [AdminMainController::class, 'destroy'])->name('eliminarRegistro');

//Email a enviar

//Route::get('/confirmacion',function(){
   // Mail::to('jesus.jarr.30@gmail.com')->send(new CitaRegistradaMailable());
    //return "mensaje enviado";
//})->name('confirmacion');

//Auth::routes();
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//prueba para ver la vista del correo esto lo vol a eliminar mas adelante pero es para testing xd
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

Route::get('/correoMM',function() {
    return view('MailMessages.DatosCita',$data =["nombre"=>"Maria","fecha"=>"10 de boviembre","psicologoNombre"=>"roberto", "correo"=>"roberto@roberto.com"]);
})->name('correoMM');

//este es el link para las citas

Route::get('/generar-cita/{id}/{horario}/{email}', [CitaController::class, 'GenerarCita']);
Route::post('/generar-manual', [CitaController::class, 'citaManual'])->name('GenerarManual');

//generacion de PDF
Route::get('/generate-pdf', [PdfController::class, 'generatePDF'])->name('pdfTest');
Route::get('/generate-semana', [PdfController::class, 'pdfSemana'])->name('pdfSemanal');
Route::get('/generate-mensual', [PdfController::class, 'pdfMes'])->name('pdfMensual');

//direccion directa para la pruab de estilos


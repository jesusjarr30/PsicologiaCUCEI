<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Comentario;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\CitaRegistradaMailable;

class citaController extends Controller
{
    public function boot()
    {
        Validator::extend('valid_birthdate', function ($attribute, $value, $parameters, $validator) {
            // Verificar si la fecha está en el formato correcto y es válida.
            if (!strtotime($value)) {
                return false;
            }
            // Calcular la fecha actual.
            $fechaActual = date('Y-m-d');

            // Verificar si la fecha de nacimiento es anterior a la fecha actual y posterior a 1960-01-01.
            return $value <= $fechaActual && $value >= '1960-01-01';
        });
    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request): RedirectResponse
{
    //Aqui se registra la cita de un usuario.
    $nombre = $request->input('nombre');
    $apellidos = $request->input('apellidos');
    $codigo = $request->input('codigo');
    $correo = $request->input('correo');
    $edad = $request->input('edad');
    $telefono = $request->input('telefono');
    $nacimiento = $request->input('nacimiento');
    // Obtener los campos para generar la tabla de comentarios
    $descripcion = $request->input('descripcion');
    $expectativas = $request->input('expectativas');
    $horario = $request->input('horario');

    // Validación
    $validator = Validator::make($request->all(), [
        'nombre' => 'required|string|max:255',
        'apellidos' => 'required|string|max:255',
        'codigo' => 'required|numeric|max:12|min:8',
        'correo' => 'required|email',
        'edad' => 'required|numeric|min:10|max:70        ', // Cambia 18 por el valor mínimo requerido
        'telefono' => 'required|numeric|min:|max:12',
        'nacimiento' => 'required|date|valid_birthdate',
        'descripcion' => 'required|string|max:500',
        'expectativas' => 'required|string|max:500',
        'horario' => 'required|string',
    ]);

    //if ($validator->fails()) {
        // Si la validación falla, redirige de vuelta con los errores
      //  return redirect()->back()
        //    ->withErrors($validator);
    //}

    $tabla1 = new Cliente();
    $tabla1->nombre = $nombre;
    $tabla1->apellidos = $apellidos;
    $tabla1->codigo = $codigo;
    $tabla1->correo = $correo;
    $tabla1->edad = $edad;
    $tabla1->telefono = $telefono;
    $tabla1->nacimiento = $nacimiento;
    $tabla1->save();

    $cliente_id = $tabla1->id;

    $tabla2 = new Comentario();
    $tabla2->cliente_id = $cliente_id;
    $tabla2->descripcion = $descripcion;
    $tabla2->expectativas = $expectativas;
    $tabla2->horario = $horario;

    $tabla2->save();

    Mail::to($correo)->send(new CitaRegistradaMailable($correo,$nombre));

    return redirect()->route('cita')->with('success', '¡El usuario se ha guardado exitosamente!');
}


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}

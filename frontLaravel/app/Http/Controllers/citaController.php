<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Comentario;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;


class citaController extends Controller
{
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
        'codigo' => 'required|string|max:10',
        'correo' => 'required|email',
        'edad' => 'required|integer|min:16', // Cambia 18 por el valor mínimo requerido
        'telefono' => 'required|string|max:12',
        'nacimiento' => 'required|date',
        'descripcion' => 'required|string',
        'expectativas' => 'required|string',
        'horario' => 'required|string',
    ]);

    if ($validator->fails()) {
        // Si la validación falla, redirige de vuelta con los errores
        return redirect()->back()
            ->withErrors($validator);
    }

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

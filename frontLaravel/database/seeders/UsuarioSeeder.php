<?php

namespace Database\Seeders;

use App\Models\Usuario;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usuario = new Usuario();
        $usuario->email = "jesus@jesus.com";
        $usuario->nombre = "jesus";
        $usuario->telefono = "jesus";
        $usuario->password = bcrypt("jesus"); // Utiliza la función bcrypt para almacenar contraseñas seguras
        $usuario->role = "ADMIN";


        
        // Crear un array asociativo para el campo JSON "horario_final"
        $horario2 = [[
            "dia" => "lunes",
            "inicio" => "Date format",
            "fin" => "Date format"
        ],
        [
            "dia" => "martes",
            "inicio" => "Date format",
            "fin" => "Date format"
        ],
        [
            "dia" => "miercoles",
            "inicio" => "Date format",
            "fin" => "Date format"
        ],
        [
            "dia" => "jueves",
            "inicio" => "Date format",
            "fin" => "Date format"
        ],
        [
            "dia" => "viernes",
            "inicio" => "Date format",
            "fin" => "Date format"
        ],
        [
            "dia" => "sabado",
            "inicio" => "Date format",
            "fin" => "Date format"
        ],
        [
            "dia" => "domingo",
            "inicio" => "Date format",
            "fin" => "Date format"
        ]
        ];
        
        // Asignar el campo JSON "horario_final"
        $usuario->horario = json_encode($horario2);
        $usuario->activo = true; // Utiliza un valor booleano en lugar de una cadena
      
        // Guarda el usuario en la base de datos
        $usuario->save();

        Usuario::factory(10)->create();

        
        


    }
}

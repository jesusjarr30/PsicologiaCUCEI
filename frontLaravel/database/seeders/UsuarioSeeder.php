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
        $usuario->horario = null; // Si el campo permite valores nulos, establece null en lugar de una cadena vacía
        $usuario->activo = true; // Utiliza un valor booleano en lugar de una cadena
      
        // Guarda el usuario en la base de datos
        $usuario->save();

        Usuario::factory(10)->create();

        
        


    }
}

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
        
        $horario2 = [
            "Lun_I"=> "10:00",
            "Lun_F" => "11:00",
            "Mar_I" => "11:00",
            "Mar_F" => "12:00",
            "Mie_I" => "12:00", 
            "Mie_F" => "13:00",
            "Jue_I" => "13:00",
            "Jue_F" => "14:00",
            "Vie_I" => "14:00",
            "Vie_F" => "15:00",
            "Sab_I" => "15:00",
            "Sab_F" => "16:00", 
        ];
        
        // Asignar el campo JSON "horario_final"
        $usuario->horario = json_encode($horario2);
        $usuario->activo = true; // Utiliza un valor booleano en lugar de una cadena
      
        // Guarda el usuario en la base de datos
        $usuario->save();
        //usuarios psicologo 

        
       $usuario2 = new Usuario();
        $usuario2->email = "ale@ale.com";
        $usuario2->nombre = "ale";
        $usuario2->telefono = "33562564";
        $usuario2->password = bcrypt("jesus"); // Utiliza la función bcrypt para almacenar contraseñas seguras
        $usuario2->role = "USER";   
        $usuario2->horario = json_encode($horario2);
        $usuario2->activo = true; // Utiliza un valor booleano en lugar de una cadena
        $usuario2->save();


        Usuario::factory(10)->create();

        
        


    }
}

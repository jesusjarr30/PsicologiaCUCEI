<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Usuario>
 */
class UsuarioFactory extends Factory
{
    protected $model = Usuario::class;

    public function definition(): array
    {
        $horario = [
            "Lun_I" => "00:00",
            "Lun_F" => "00:00",
            "Mar_I" => "00:00",
            "Mar_F" => "00:00",
            "Mie_I" => "00:00", 
            "Mie_F" => "00:00",
            "Jue_I" => "00:00",
            "Jue_F" => "00:00",
            "Vie_I" => "00:00",
            "Vie_F" => "00:00",
            "Sab_I" => "00:00",
            "Sab_F" => "00:00", 
        ];

        return [
            'nombre' => $this->faker->text(5),
            'email' => $this->faker->email(),
            'telefono' => $this->faker->phoneNumber(),
            'password' => $this->faker->text(5),
            'role' => $this->faker->randomElement(['ADMIN', 'USER']),
            'horario' => json_encode($horario),
            
            'activo' => true,
        ];
    }
}


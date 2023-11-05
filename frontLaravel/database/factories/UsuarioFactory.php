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
            "dias" => ["Lunes", "Martes", "Miércoles"],
            "horas" => ["08:00 AM", "09:00 AM", "10:00 AM"],
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


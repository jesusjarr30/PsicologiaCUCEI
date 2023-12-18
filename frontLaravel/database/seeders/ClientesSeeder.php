<?php

namespace Database\Seeders;

use App\Models\Cliente;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cliente = new Cliente();
        $cliente->nombre = "Paciente";
        $cliente->apellidos = "cita";
        $cliente->codigo = "26207801";
        $cliente->correo = "Paciente@Cita.com";
        $cliente->edad = 19;
        $cliente->telefono = "3310611795";
        $cliente->descripcion = "toy tiste";
        $cliente->expectativas = "ya no estar tiste";
        $cliente->horario = json_encode(["Jue" => "12:00", "Lun" => "11:00", "Mar" => "15:00", "Mie" => "11:00", "Vie" => "12:00"]);

        $cliente->nacimiento = '1997-03-11';
        $cliente->save();


        $cliente1 = new Cliente();
        $cliente1->nombre = "Paciente1";
        $cliente1->apellidos = "cita1";
        $cliente1->codigo = '23793103';
        $cliente1->correo = "Paciente1@Cita1.com";
        $cliente1->edad = 23;
        $cliente1->telefono = '3724879382';
        $cliente1->descripcion = "toy tiste 1";
        $cliente1->expectativas = "ya no estar tiste 1";
        $cliente1->horario = json_encode(["Jue" => "12:00", "Lun" => "11:00", "Mar" => "15:00", "Mie" => "11:00", "Vie" => "12:00"]);

        $cliente1->nacimiento = '2001-05-13';
        $cliente1->save();

        $cliente2 = new Cliente();
        $cliente2->nombre = "Paciente2";
        $cliente2->apellidos = "cita2";
        $cliente2->codigo = '28148182';
        $cliente2->correo = "Paciente2@Cita2.com";
        $cliente2->edad = 21;
        $cliente2->telefono = '3314811782';
        $cliente2->descripcion = "toy tiste 2";
        $cliente2->expectativas = "ya no estar tiste 2";
        $cliente2->horario = json_encode(["Jue" => "12:00", "Lun" => "11:00", "Mar" => "15:00", "Mie" => "11:00", "Vie" => "12:00"]);

        $cliente2->nacimiento = '1997-06-14';
        $cliente2->save();

        $cliente3 = new Cliente();
        $cliente3->nombre = "Paciente3";
        $cliente3->apellidos = "cita3";
        $cliente3->codigo = '23723403';
        $cliente3->correo = "Paciente3@Cita3.com";
        $cliente3->edad = 23;
        $cliente3->telefono = '3724234382';
        $cliente3->descripcion = "toy tiste 3";
        $cliente3->expectativas = "ya no estar tiste 3";
        $cliente3->horario = json_encode(["Jue" => "12:00", "Lun" => "11:00", "Mar" => "15:00", "Mie" => "11:00", "Vie" => "12:00"]);

        $cliente3->nacimiento = '2000-03-23';
        $cliente3->save();

        $cliente4 = new Cliente();
        $cliente4->nombre = "Paciente4";
        $cliente4->apellidos = "cita4";
        $cliente4->codigo = '21653958';
        $cliente4->correo = "Paciente4@Cita4.com";
        $cliente4->edad = 22;
        $cliente4->telefono = '3724399358';
        $cliente4->descripcion = "toy tiste 4";
        $cliente4->expectativas = "ya no estar tiste 4";
        $cliente4->horario = json_encode(["Jue" => "12:00", "Lun" => "11:00", "Mar" => "15:00", "Mie" => "11:00", "Vie" => "12:00"]);

        $cliente4->nacimiento = '2001-10-22';
        $cliente4->save();

        $cliente5 = new Cliente();
        $cliente5->nombre = "Paciente5";
        $cliente5->apellidos = "cita5";
        $cliente5->codigo = '29184898';
        $cliente5->correo = "Paciente5@Cita5.com";
        $cliente5->edad = 20;
        $cliente5->telefono = '3724318398';
        $cliente5->descripcion = "toy tiste 5";
        $cliente5->expectativas = "ya no estar tiste 5";
        $cliente5->horario = json_encode(["Jue" => "12:00", "Lun" => "11:00", "Mar" => "15:00", "Mie" => "11:00", "Vie" => "12:00"]);

        $cliente5->nacimiento = '2001-12-03';
        $cliente5->save();

        $cliente6 = new Cliente();
        $cliente6->nombre = "Paciente6";
        $cliente6->apellidos = "cita6";
        $cliente6->codigo = '27833411';
        $cliente6->correo = "Paciente6@Cita6.com";
        $cliente6->edad = 23;
        $cliente6->telefono = '3724838311';
        $cliente6->descripcion = "toy tiste 6";
        $cliente6->expectativas = "ya no estar tiste 6";
        $cliente6->horario = json_encode(["Jue" => "12:00", "Lun" => "11:00", "Mar" => "15:00", "Mie" => "11:00", "Vie" => "12:00"]);

        $cliente6->nacimiento = '2000-03-23';
        $cliente6->save();

        $cliente7 = new Cliente();
        $cliente7->nombre = "Paciente7";
        $cliente7->apellidos = "cita7";
        $cliente7->codigo = '20458505';
        $cliente7->correo = "Paciente7@Cita7.com";
        $cliente7->edad = 23;
        $cliente7->telefono = '3724588305';
        $cliente7->descripcion = "toy tiste 7";
        $cliente7->expectativas = "ya no estar tiste 7";
        $cliente7->horario = json_encode(["Jue" => "12:00", "Lun" => "11:00", "Mar" => "15:00", "Mie" => "11:00", "Vie" => "12:00"]);

        $cliente7->nacimiento = '2000-03-23';
        $cliente7->save();

        $cliente8 = new Cliente();
        $cliente8->nombre = "Paciente8";
        $cliente8->apellidos = "cita8";
        $cliente8->codigo = '24268173';
        $cliente8->correo = "Paciente8@Cita8.com";
        $cliente8->edad = 23;
        $cliente8->telefono = '3724818373';
        $cliente8->descripcion = "toy tiste 8";
        $cliente8->expectativas = "ya no estar tiste 8";
        $cliente8->horario = json_encode(["Jue" => "12:00", "Lun" => "11:00", "Mar" => "15:00", "Mie" => "11:00", "Vie" => "12:00"]);

        $cliente8->nacimiento = '2000-03-23';
        $cliente8->save();

        $cliente9 = new Cliente();
        $cliente9->nombre = "Paciente9";
        $cliente9->apellidos = "cita9";
        $cliente9->codigo = '21845215';
        $cliente9->correo = "Paciente9@Cita9.com";
        $cliente9->edad = 23;
        $cliente9->telefono = '3310451715';
        $cliente9->descripcion = "toy tiste 9";
        $cliente9->expectativas = "ya no estar tiste 9";
        $cliente9->horario = json_encode(["Jue" => "12:00", "Lun" => "11:00", "Mar" => "15:00", "Mie" => "11:00", "Vie" => "12:00"]);

        $cliente9->nacimiento = '2000-03-23';
        $cliente9->save();

        $cliente10 = new Cliente();
        $cliente10->nombre = "Paciente10";
        $cliente10->apellidos = "cita10";
        $cliente10->codigo = '21561391';
        $cliente10->correo = "Paciente10@Cita10.com";
        $cliente10->edad = 23;
        $cliente10->telefono = '3310131791';
        $cliente10->descripcion = "toy tiste 10";
        $cliente10->expectativas = "ya no estar tiste 10";
        $cliente10->horario = json_encode(["Jue" => "12:00", "Lun" => "11:00", "Mar" => "15:00", "Mie" => "11:00", "Vie" => "12:00"]);
        $cliente10->nacimiento = '2000-03-23';
        $cliente10->save();

        $cliente11 = new Cliente();
        $cliente11->nombre = "Paciente11";
        $cliente11->apellidos = "cita11";
        $cliente11->codigo = '22169707';
        $cliente11->correo = "Paciente11@Cita11.com";
        $cliente11->edad = 23;
        $cliente11->telefono = '3319731707';
        $cliente11->descripcion = "toy tiste 11";
        $cliente11->expectativas = "ya no estar tiste 11";
        $cliente11->horario = json_encode(["Jue" => "12:00", "Lun" => "11:00", "Mar" => "15:00", "Mie" => "11:00", "Vie" => "12:00"]);
        $cliente11->nacimiento = '2000-03-23';
        $cliente11->save();

        $cliente12 = new Cliente();
        $cliente12->nombre = "Paciente12";
        $cliente12->apellidos = "cita12";
        $cliente12->codigo = '26871159';
        $cliente12->correo = "Paciente12@Cita12.com";
        $cliente12->edad = 23;
        $cliente12->telefono = '3319711759';
        $cliente12->descripcion = "toy tiste 12";
        $cliente12->expectativas = "ya no estar tiste 12";
        $cliente12->horario = json_encode(["Jue" => "12:00", "Lun" => "11:00", "Mar" => "15:00", "Mie" => "11:00", "Vie" => "12:00"]);
        $cliente12->nacimiento = '2000-03-23';
        $cliente12->save();

        $cliente13 = new Cliente();
        $cliente13->nombre = "Paciente13";
        $cliente13->apellidos = "cita13";
        $cliente13->codigo = '25003998';
        $cliente13->correo = "Paciente13@Cita13.com";
        $cliente13->edad = 23;
        $cliente13->telefono = '3319703798';
        $cliente13->descripcion = "toy tiste 13";
        $cliente13->expectativas = "ya no estar tiste 13";
        $cliente13->horario = json_encode(["Jue" => "12:00", "Lun" => "11:00", "Mar" => "15:00", "Mie" => "11:00", "Vie" => "12:00"]);
        $cliente13->nacimiento = '2000-03-23';
        $cliente13->save();

        
    }
}

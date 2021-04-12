<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class usuario extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('t_usuario')->insert([
            'nombre_usuario'=>'Erick123',
            'nombre_operario'=>'Erick',
            'apellido_usuario'=>'Matamoros',
            'email'=>'alexalonso2706@gmail.com',
            'password'=> bcrypt('estoesunaprueba'),
            'rol'=>1,
            'session_id'=> 'texto',
        ]);

        DB::table('t_labores')->insert([
            'dias_laborales_semana'=>5,
            'horas_laborales_dia'=>8.
        ]);

    }
}

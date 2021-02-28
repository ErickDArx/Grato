<?php

use Illuminate\Database\Seeder;

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
            'nombre_usuario'=>'Erick',
            'apellido_usuario'=>'Matamoros',
            'puesto'=>'Administrador',
            'roll'=>1,
            'correo'=>'alonso@gmail.com',
            'password'=> bcrypt('12345678'),
        ]);
    }
}

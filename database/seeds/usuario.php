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
            'nombre_usuario'=>'Alonso',
            'apellido_usuario'=>'Matamoros',
            'puesto'=>'Administrador',
            'email'=>'super@gmail.com',
            'password'=> bcrypt('estoesunaprueba'),
            'roll'=>0,
        ]);
        
    }
}

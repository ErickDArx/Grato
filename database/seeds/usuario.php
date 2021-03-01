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
            'nombre_usuario'=>'Super',
            'apellido_usuario'=>'Matamoros',
            'puesto'=>'Administrador',
            'roll'=>0,
            'correo'=>'super@gmail.com',
            'password'=> bcrypt('estoesunaprueba'),
        ]);
        
    }
}

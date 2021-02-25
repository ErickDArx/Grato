<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TUsuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_usuario', function (Blueprint $table) {
            $table->bigIncrements('id_usuario');
            $table->string('nombre_usuario');
            $table->string('apellido_usuario');
            $table->string('puesto');
            $table->string('correo');
            $table->string('contraseña');
            $table->boolean('roll');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_usuario');
    }
}

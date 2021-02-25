<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_usuario', function (Blueprint $table) {
            $table->BigIncrements('id_usuario');
            $table->string('nombre_usuario');
            $table->string('apellido_usuario');
            $table->string('puesto');
            $table->string('correo');
            $table->string('contraseña');
            $table->boolean('roll');
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

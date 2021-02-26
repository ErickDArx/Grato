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
            $table->string('nombre_usuario')->nullable();
            $table->string('apellido_usuario')->nullable();
            $table->string('puesto')->nullable();
            $table->string('correo')->nullable();
            $table->string('contraseña')->nullable();
            $table->boolean('roll')->nullable();
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

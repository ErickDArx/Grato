<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTUsuarioTable extends Migration
{

    public function up()
    {
        Schema::create('t_usuario', function (Blueprint $table) {
            $table->BigIncrements('id_usuario');
            $table->string('nombre_usuario')->unique();
            $table->string('nombre_operario');
            $table->string('apellido_usuario');
            $table->string('segundo_apellido_usuario')->nullable();
            $table->string('email');
            $table->string('password');
            $table->boolean('rol');
            $table->text('session_id')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('t_usuario');
    }
}

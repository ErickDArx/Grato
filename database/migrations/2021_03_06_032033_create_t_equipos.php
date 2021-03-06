<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTEquipos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_equipos', function (Blueprint $table) {
            $table->bigIncrements('id_equipo');
            $table->string('nombre_equipo');
            $table->decimal('costo_minuto',4,2);
            $table->integer('tiempo_uso');
            $table->decimal('total',8,2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_equipos');
    }
}

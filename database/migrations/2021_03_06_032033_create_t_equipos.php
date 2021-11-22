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
            $table->bigInteger('precio');
            $table->integer('vida_util');
            $table->decimal('valor_rescate')->nullable();
            $table->bigInteger('depreciacion_anual');
            $table->bigInteger('porcentaje_utilizacion');
            $table->bigInteger('depreciacion_anual_real');
            $table->bigInteger('depreciacion_mensual');
            $table->bigInteger('depreciacion_semanal');
            $table->bigInteger('depreciacion_diaria');
            $table->bigInteger('depreciacion_hora');
            $table->bigInteger('depreciacion_minuto');
            $table->bigInteger('tiempo_minutos')->nullable();
            $table->bigInteger('costo')->nullable();


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

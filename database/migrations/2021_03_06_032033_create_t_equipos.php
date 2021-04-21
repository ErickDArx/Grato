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
            $table->decimal('precio',8,2);
            $table->integer('vida_util');
            $table->decimal('valor_rescate',8,2)->nullable();
            $table->decimal('depreciacion_anual',8,2);
            $table->decimal('porcentaje_utilizacion',8,2);
            $table->decimal('depreciacion_anual_real',8,2);
            $table->decimal('depreciacion_mensual',8,2);
            $table->decimal('depreciacion_semanal',8,2);
            $table->decimal('depreciacion_diaria',8,2);
            $table->decimal('depreciacion_hora',8,2);
            $table->decimal('depreciacion_minuto',8,2);
            $table->integer('tiempo_minutos')->nullable();
            $table->decimal('costo',8,2)->nullable();


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

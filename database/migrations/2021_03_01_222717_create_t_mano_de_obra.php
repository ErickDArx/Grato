<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTManoDeObra extends Migration
{

    public function up()
    {
        Schema::create('t_mano_de_obra', function (Blueprint $table) {
            $table->bigIncrements('id_mano_de_obra');
            $table->string('nombre_trabajador');
            $table->string('apellido_trabajador');
            $table->bigInteger('salario_mensual');
            $table->bigInteger('salario_semanal');
            $table->bigInteger('salario_diario');
            $table->bigInteger('salario_hora');
            $table->bigInteger('salario_minuto');
            $table->bigInteger('salario_costo_extra');
            $table->bigInteger('salario_costo_hora_doble');
            $table->bigInteger('tiempo_trabajado')->nullable();
            $table->bigInteger('costo_minuto')->nullable();

            // $table->unsignedDecimal('minutos_trabajados');
            // $table->unsignedDecimal('costo_minuto');
            // $table->unsignedDecimal('total_mano_obra');

        });
    }

    public function down()
    {
        Schema::dropIfExists('t_mano_de_obra');
    }
}

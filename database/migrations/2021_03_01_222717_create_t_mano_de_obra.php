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
            $table->decimal('salario_mensual',8,2);
            $table->decimal('salario_semanal',8,2);
            $table->decimal('salario_diario',8,2);
            $table->decimal('salario_hora',8,2);
            $table->decimal('salario_minuto',8,2);
            $table->decimal('salario_costo_extra',8,2);
            $table->decimal('salario_costo_hora_doble',8,2);

            // $table->unsignedDecimal('minutos_trabajados');
            // $table->unsignedDecimal('costo_minuto');
            // $table->unsignedDecimal('total_mano_obra');

            // $table->integer('id_usuario');
            $table->integer('id_labor');
            // $table->foreign('id_usuario')->references('id_usuario')->on('t_usuario');
            $table->foreign('id_labor')->references('id_labor')->on('t_labores');

        });
    }

    public function down()
    {
        Schema::dropIfExists('t_mano_de_obra');
    }
}

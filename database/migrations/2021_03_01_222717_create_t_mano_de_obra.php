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
            $table->integer('tiempo_trabajado')->nullable();
            $table->decimal('costo_minuto',8,2)->nullable();

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

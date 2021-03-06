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
            $table->unsignedDecimal('minutos_trabajados');
            $table->unsignedDecimal('costo_minuto');
            $table->unsignedDecimal('total_mano_obra');
            $table->integer('id_usuario');
            $table->foreign('id_usuario')->references('id_usuario')->on('t_usuario');
        });
    }

    public function down()
    {
        Schema::dropIfExists('t_mano_de_obra');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTValores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_valores', function (Blueprint $table) {
            $table->bigIncrements('id_valores');
            $table->bigInteger('porcentaje_utilizacion');
            $table->bigInteger('consumo_empresa');
            $table->bigInteger('porcentaje_produccion');
            $table->bigInteger('consumo_produccion');
            $table->bigInteger('produccion_mensual');
            $table->bigInteger('promedio');
            $table->bigInteger('total');
        });

        Schema::table('t_valores', function($table) {
            $table->bigInteger('id_cif')->unsigned()->index(); // this is working
            $table->foreign('id_cif')->references('id_cif')->on('t_cif')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_valores');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTCostoUnitario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_costo_unitario', function (Blueprint $table) {
            $table->bigIncrements('id_costo_unitario');
            $table->bigInteger('id_producto')->unsigned()->index(); // this is working
            $table->foreign('id_producto')->references('id_producto')->on('t_producto')->onDelete('cascade');
            $table->bigInteger('id_mano_de_obra')->unsigned()->index(); // this is working
            $table->foreign('id_mano_de_obra')->references('id_mano_de_obra')->on('t_mano_de_obra')->onDelete('cascade');
            $table->bigInteger('id_equipo')->unsigned()->index(); // this is working
            $table->foreign('id_equipo')->references('id_equipo')->on('t_equipo')->onDelete('cascade');
            $table->dateTime('fecha');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_costo_unitario');
    }
}

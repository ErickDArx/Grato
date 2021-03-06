<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTCif extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_cif', function (Blueprint $table) {
            $table->bigIncrements('id_cif');
            $table->string('nombre_cif');
            $table->decimal('recibo_pagar',4,2);
            $table->decimal('porcentaje_utilizacion',4,2);
            $table->decimal('porcentaje_produccion',4,2);
            $table->decimal('porcentaje_promedio',4,2);
            $table->decimal('promedio_pagos',4,2);
            $table->date('fecha');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_cif');
    }
}

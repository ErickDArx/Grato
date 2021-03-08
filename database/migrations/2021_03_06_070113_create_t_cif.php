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
            $table->decimal('recibo_pagar',8,2);
            $table->decimal('porcentaje_utilizacion',8,2);
            $table->decimal('porcentaje_produccion',8,2);
            $table->decimal('produccion_mensual',8,2);
            $table->decimal('total',8,2);
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

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
            $table->decimal('porcentaje_utilizacion',8,2);
            $table->decimal('consumo_empresa',8,2);
            $table->decimal('porcentaje_produccion',8,2);
            $table->decimal('consumo_produccion',8,2);
            $table->decimal('produccion_mensual',8,2);
            $table->decimal('promedio',8,2);
            $table->decimal('total',8,2);
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

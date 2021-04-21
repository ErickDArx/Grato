<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTMes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_mes', function (Blueprint $table) {
            $table->bigIncrements('id_mes');
            $table->date('fecha');
            $table->decimal('recibo_pagar',8,2);
        });

        Schema::table('t_mes', function($table) {
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
        Schema::dropIfExists('t_mes');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViaticos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_viaticos', function (Blueprint $table) {
            $table->bigIncrements('id_viatico');
            $table->integer('antiguedad_vehiculo')->nullable();
            $table->decimal('kilometros',4,2)->nullable();
            $table->decimal('desayuno',8,2)->nullable();
            $table->decimal('almuerzo',8,2)->nullable();
            $table->decimal('cena',8,2)->nullable();
            $table->decimal('costo_hospedaje',8,2)->nullable();
            $table->decimal('total',8,2);
            $table->decimal('cobro_general',8,2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_viaticos');
    }
}

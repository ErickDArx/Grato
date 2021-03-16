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
            $table->string('tipo_de_vehiculo');
            $table->integer('antiguedad_vehiculo_años');
            $table->decimal('tarifa_km_recorrido',8,2);
            $table->decimal('km_recorridos',8,2);
            $table->decimal('total_km',8,2);
      
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

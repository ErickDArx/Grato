<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViaticos extends Migration
{

    public function up()
    {
        Schema::create('t_viaticos', function (Blueprint $table) {
            $table->bigIncrements('id_viatico');
            $table->string('tipo_de_vehiculo');
            $table->integer('antiguedad_vehiculo_años');
            $table->bigInteger('tarifa_km_recorrido');
            $table->bigInteger('km_recorridos');
            $table->bigInteger('total_km');
      
        });
    }

    public function down()
    {
        Schema::dropIfExists('t_viaticos');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTProducto extends Migration
{

    public function up()
    {
        Schema::create('t_producto', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->bigIncrements('id_producto');
            $table->string('nombre_producto');
            $table->dateTime('fecha');
        });
    }

    public function down()
    {
        Schema::dropIfExists('t_producto');
    }
}

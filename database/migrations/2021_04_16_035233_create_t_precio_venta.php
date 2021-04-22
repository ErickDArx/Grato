<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTPrecioVenta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_precio_venta', function (Blueprint $table) {
            $table->bigIncrements('id_precio_venta');
            $table->bigInteger('margen_utilidad')->nullable();
            $table->bigInteger('precio_venta')->nullable();
            $table->bigInteger('ganancia_unidad')->nullable();
        });

        Schema::table('t_precio_venta', function($table) {
            $table->bigInteger('id_producto')->unsigned()->index(); // this is working
            $table->foreign('id_producto')->references('id_producto')->on('t_producto')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_precio_venta');
    }
}

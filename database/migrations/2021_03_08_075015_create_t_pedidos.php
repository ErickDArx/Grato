<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTPedidos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_pedidos', function (Blueprint $table) {
            $table->bigIncrements('id_Pedido');
            $table->string('nombre_cliente');
            $table->date('fecha_pedido');
            $table->integer('orden');
            $table->decimal('Precio_final', 8, 2);
            $table->decimal('IVA', 8, 2);
            $table->integer('id_recetario');
            $table->integer('id_mano_de_obra');
            $table->integer('id_mano_de_obra_extra');
            $table->integer('id_usuario');
            $table->integer('id_equipo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_pedidos');
    }
}

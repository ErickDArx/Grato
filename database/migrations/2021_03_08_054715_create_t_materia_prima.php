<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTMateriaPrima extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_materia_prima', function (Blueprint $table) {
            $table->bigIncrements('id_materia_prima');
            $table->string('producto');
            $table->string('unidad_medida');
            $table->integer('presentacion');
            $table->integer('cantidad');
            $table->decimal('costo', 8, 2);
            $table->decimal('precio_um', 8, 2);
            $table->integer('id_producto');

            $table->foreign('id_producto')->references('id_producto')->on('t_materia_prima');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_materia_prima');
    }
}

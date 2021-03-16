<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTRecetario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_recetario', function (Blueprint $table) {
            $table->bigIncrements('id_recetario');
            $table->string('nombre_receta');
            $table->integer('tiempo_elaboración');
            $table->decimal('costo', 8, 2);
            $table->integer('id_materia_prima');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_recetario');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTCif extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_cif', function (Blueprint $table) {
            $table->bigIncrements('id_cif');
            $table->string('nombre_cif');
        });
    }

    public function down()
    {
        Schema::dropIfExists('t_cif');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipos', function (Blueprint $table) {
          $table->id();
            $table->string('eq_modelo');
            $table->string('eq_marca');
            $table->string('eq_serial')->unique();
            $table->integer('eq_tequid')->references('id')->on('tipo_equipos');
            $table->string('eq_nbiennacional')->unique();
            $table->boolean('eq_estatus')->nullable();
            $table->integer('departamentos_dep_id')->references('id')->on('departamentos');
            //$table->integer('ubicacion_equipo_ubeq')->references('ubeq_id')->on('ubicacion_equipos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipos');
    }
}

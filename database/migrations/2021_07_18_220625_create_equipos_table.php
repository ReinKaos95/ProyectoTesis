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
            $table->string('eq_serial')->unique();
            $table->foreignId('eq_tequid');
            $table->string('eq_nbiennacional')->unique();
            $table->boolean('eq_estatus')->nullable();
            $table->string('eq_marca')->unique();
            $table->string('eq_modelo')->unique();
            $table->foreignId('departamentos_dep_id');
            //$table->foreignId('ubicacion_equipo_ubeq');
            $table->timestamps();
            //$table->foreign('marcas_mar_id')->references('id')->on('marcas');
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

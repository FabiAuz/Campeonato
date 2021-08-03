<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJugadorEquiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jugador_equipos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('jugador_id');
            $table->integer('equipo_id');

            $table->integer('campeonato_id')->nullable();

            $table->foreign('campeonato_id')->references('id')->on('jugadores');
            $table->foreign('jugador_id')->references('id')->on('jugadores');
            $table->foreign('equipo_id')->references('id')->on('equipos');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jugador_equipos');
    }
}

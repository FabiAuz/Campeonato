<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJugadorPartidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jugador_partidos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('jugador_id');
            $table->integer('partido_id');
            $table->string('posicion',50);
            $table->integer('numero');
            $table->integer('goles')->nullable();

            $table->foreign('jugador_id')->references('id')->on('jugadores');
            $table->foreign('partido_id')->references('id')->on('partidos');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jugador_partidos');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partidos', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->time('hora');
            $table->string('arbitro',50);
            $table->integer('gol_equipo1')->nullable();
            $table->integer('gol_equipo2')->nullable();
            $table->integer('estadio_id')->nullable();
            $table->integer('equipo1_id');
            $table->integer('equipo2_id');
            $table->integer('campeonato_id');
            $table->foreign('estadio_id')->references('id')->on('estadios');
            $table->foreign('equipo1_id')->references('id')->on('equipos');
            $table->foreign('equipo2_id')->references('id')->on('equipos');
            $table->foreign('campeonato_id')->references('id')->on('campeonatos');
        });
    }


    public function down()
    {
        Schema::dropIfExists('partidos');
    }
}

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
            $table->string('juez',50);
            $table->string('arbitro',50);
            $table->integer('goles')->nullable();
            $table->integer('estadio_id');
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

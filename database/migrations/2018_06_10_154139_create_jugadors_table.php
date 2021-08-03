<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJugadorsTable extends Migration
{
    public function up()
    {
        Schema::create('jugadores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cedula',10)->unique();
            $table->string('nombre',50);
            $table->string('apellido',50);
            $table->date('fecha_nac');
            $table->double('estatura',1,2);
            $table->string('nacionalidad',50);
            $table->string('ciudad',50)->nullable();
            $table->string('descripcion')->nullable();
            $table->string('imagen');
            $table->integer('numero');
            $table->string('posicion',50);
            $table->string('tipo',20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jugadors');
    }
}

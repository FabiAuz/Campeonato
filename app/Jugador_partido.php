<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jugador_partido extends Model
{
      protected $table ='jugador_partidos';
    protected $primaryKey='id';
    public $timestamps = false;
    protected $fillable=[
        'jugador_id',
        'partido_id',
    ];
}

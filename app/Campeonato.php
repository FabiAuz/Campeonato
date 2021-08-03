<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campeonato extends Model
{
    protected $table ='campeonatos';
    protected $primaryKey='id';
    public $timestamps = false;
    protected $fillable=[
        'nombre',
        'cant_equipos',
        'fecha_inicio',
        'modalidad',
        'usuario_id',
        ];
}

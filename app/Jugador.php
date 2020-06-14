<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jugador extends Model
{
    protected $table ='jugadores';
    protected $primaryKey='id';
    public $timestamps = false;
    protected $fillable=[
        'id',
        'cedula',
        'nombre',
        'apellido',
        'fecha_nac',
        'estatura',
        'nacionalidad',
        'ciudad',
        'descripcion',
        'imagen',
        'posicion',
        'numero',
        'tipo',
    ];
    public function equipo()
    {
        return $this->belongsToMany('App\Models\Equipo', 'equipos', 'equipo_id', 'jugador_id');
    }
}

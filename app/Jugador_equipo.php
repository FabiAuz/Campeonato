<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jugador_equipo extends Model
{
    protected $table ='jugador_equipos';
    protected $primaryKey='id';
    public $timestamps = false;
    protected $fillable=[
        'jugador_id',
        'equipo_id',
    ];

    public function equipo()
    {
        return $this->belongsTo(Equipo::class, 'equipo_id');
    }
    public function jugador()
    {
        return $this->belongsTo(Jugador::class, 'jugador_id');
    }


}

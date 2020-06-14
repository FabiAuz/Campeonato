<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partido extends Model
{
    protected $table ='partidos';
    protected $primaryKey='id';
    public $timestamps = false;
    protected $fillable=[
		'fecha',
		'arbitro',
		'gol_equipo1',
		'estadio_id',
        'equipo1_id',
        'equipo2_id',
        'campeonato_id',
		'gol_equipo2',
        'hora'
		
    ];




public function equipo1()
{
    return $this->belongsTo(Equipo::class, 'equipo1_id');
}
public function equipo2()
{
    return $this->belongsTo(Equipo::class, 'equipo2_id');
}

    public function estadio()
    {
        return $this->belongsTo(Estadio::class, 'estadio_id');
    }
}
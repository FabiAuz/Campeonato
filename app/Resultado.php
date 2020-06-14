<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resultado extends Model
{
    protected $table ='resultados';
    protected $primaryKey='id';
    public $timestamps = false;
    protected $fillable=[
        'equipo_id',
        'campeonato_id',
        'goles',
        'puntos',
        'grupo',
        'fase',
    ];




    public function equipo()
    {
        return $this->belongsTo(Equipo::class, 'equipo_id');
    }
    public function campeonato()
    {
        return $this->belongsTo(Campeonato::class, 'campeonato_id');
    }
}

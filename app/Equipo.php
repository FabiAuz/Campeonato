<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    protected $table ='equipos';
    protected $primaryKey='id';
    public $timestamps = false;
    protected $fillable=[
        'nombre',
        'logo',
        'fecha_creacion',
        'propietario',
        'descripcion',
        'presidente_id'
    ];

    public function presidente()
    {
        return $this->belongsTo(User::class, 'presidente_id');
    }
}


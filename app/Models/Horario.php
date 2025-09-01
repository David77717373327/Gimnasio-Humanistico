<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $fillable = [
        'grado_id',                                 
        'asignatura_id',
        'user_id',
        'dia',
        'hora_inicio',
        'hora_fin'  
    ];

    public function grado()
    {
        return $this->belongsTo(Grado::class);
    }

    public function asignatura()
    {
        return $this->belongsTo(Asignatura::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
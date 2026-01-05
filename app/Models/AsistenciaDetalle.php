<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AsistenciaDetalle extends Model
{
    protected $fillable = [
        'asistencia_id','user_id','estado'
    ];

    public function asistencia()
    {
        return $this->belongsTo(Asistencia::class);
    }

    public function estudiante()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}


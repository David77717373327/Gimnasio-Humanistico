<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    protected $fillable = [
        'fecha','grado_id','asignatura_id','profesor_id'
    ];

    public function grado()
    {
        return $this->belongsTo(Grado::class);
    }

    public function profesor()
    {
        return $this->belongsTo(User::class, 'profesor_id');
    }

    public function asignatura()
    {
        return $this->belongsTo(Asignatura::class);
    }

    public function detalle()
    {
        return $this->hasMany(AsistenciaDetalle::class);
    }
}


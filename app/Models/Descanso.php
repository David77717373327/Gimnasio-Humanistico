<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Descanso extends Model
{
    protected $fillable = ['grado_id','hora_inicio','hora_fin'];

    public function grado()
    {
        return $this->belongsTo(Grado::class);
    }
}


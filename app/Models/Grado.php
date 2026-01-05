<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Grado extends Model
{
    protected $fillable = ['nombre','nivel_id'];

    public function nivel()
    {
        return $this->belongsTo(Nivel::class);
    }

    public function estudiantes()
    {
        return $this->hasMany(User::class);
    }

    public function horarios()
    {
        return $this->hasMany(Horario::class);
    }

    public function descansos()
    {
        return $this->hasMany(Descanso::class);
    }
}


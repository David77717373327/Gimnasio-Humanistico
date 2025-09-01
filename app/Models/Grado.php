<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    protected $fillable = ['nombre'];

    public function horarios()
    {
        return $this->hasMany(Horario::class);
    }
    public function estudiantes()
    {
        return $this->hasMany(User::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}


<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Nivel extends Model
{

    protected $table = 'niveles'; // ← IMPORTANTE


    protected $fillable = ['nombre'];

    public function grados()
    {
        return $this->hasMany(Grado::class);
    }

   
}

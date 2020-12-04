<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    public function partidos() {
        return $this->hasMany(Partido::class);
    }
}

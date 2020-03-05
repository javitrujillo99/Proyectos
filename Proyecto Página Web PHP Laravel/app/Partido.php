<?php

namespace App;

use http\QueryString;
use Illuminate\Database\Eloquent\Model;

class Partido extends Model
{
    public function equipoLocal()
    {
        return $this->belongsTo(Equipo::class, 'id_equipo_local');
    }

    public function equipoVisitante()
    {
        return $this->belongsTo(Equipo::class, 'id_equipo_visitante');
    }

    public function ventas() {
        return $this->hasMany(Venta::class);
    }
}

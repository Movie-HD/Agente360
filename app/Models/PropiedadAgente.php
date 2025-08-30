<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropiedadAgente extends Model
{
    protected $fillable = ['propiedad_id', 'user_id', 'porcentaje_comision', 'tipo'];

    public function propiedad()
    {
        return $this->belongsTo(Propiedad::class);
    }

    public function agente()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

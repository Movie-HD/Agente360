<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropiedadCliente extends Model
{
    protected $fillable = ['propiedad_id', 'cliente_id', 'nivel_interes', 'estado_contacto'];

    public function propiedad()
    {
        return $this->belongsTo(Propiedad::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function citas()
    {
        return $this->hasMany(Cita::class);
    }
}

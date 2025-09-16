<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $fillable = ['organizacion_id', 'propiedad_cliente_id', 'cliente_id', 'propiedad_id', 'user_id', 'fecha_hora', 'estado', 'feedback'];

    public function propiedadCliente()
    {
        return $this->belongsTo(PropiedadCliente::class);
    }

    public function agente()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function organizacion()
    {
        return $this->belongsTo(Organizacion::class);
    }
}

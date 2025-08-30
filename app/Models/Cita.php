<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $fillable = ['propiedad_cliente_id', 'user_id', 'fecha_hora', 'estado', 'feedback'];

    public function propiedadCliente()
    {
        return $this->belongsTo(PropiedadCliente::class);
    }

    public function agente()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

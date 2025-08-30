<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Propiedad extends Model
{
    use SoftDeletes;
    protected $table = 'propiedades';
    
    protected $fillable = [
        'organizacion_id',
        'user_id',
        'cliente_id',
        'title',
        'tipo',
        'direccion',
        'precio',
        'currency_id',
        'area_total',
        'area_construida',
        'dormitorios',
        'banos',
        'estacionamientos',
        'antiguedad',
        'amoblado',
        'exclusividad',
        'estado',
    ];

    public function organizacion()
    {
        return $this->belongsTo(Organizacion::class);
    }

    public function creador()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function propietario()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function medios()
    {
        return $this->hasMany(PropiedadMedio::class);
    }

    public function agentes()
    {
        return $this->hasMany(PropiedadAgente::class);
    }

    public function interesados()
    {
        return $this->hasMany(PropiedadCliente::class);
    }

    public function propiedadClientes()
    {
        return $this->hasMany(PropiedadCliente::class);
    }
}

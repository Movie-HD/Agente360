<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'organizacion_id',
        'user_id',
        'name',
        'last_name',
        'phone',
        'email',
        'address',
        'tipo',
        'notas',
    ];

    public function organizacion()
    {
        return $this->belongsTo(Organizacion::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function propiedades()
    {
        return $this->hasMany(Propiedad::class, 'cliente_id'); // como propietario
    }

    public function intereses()
    {
        return $this->hasMany(PropiedadCliente::class); // como interesado
    }
}

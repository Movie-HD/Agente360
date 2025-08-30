<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropiedadMedio extends Model
{
    protected $fillable = ['propiedad_id', 'medio', 'link', 'fecha_publicacion', 'costo'];

    public function propiedad()
    {
        return $this->belongsTo(Propiedad::class);
    }
}

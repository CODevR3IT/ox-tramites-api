<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Catalogo extends Model
{
    protected $table = 'ca_catalogos';
    protected $fillable = [
        'descripcion',
        'detalle',
        'estatus'
    ];
    protected $attributes = [
        'estatus'=>false,
    ];

    public function campoCatalogo(): HasMany
    {
        return $this->hasMany(CampoCatalogo::class, 'ca_catalogo_id', 'id');
    }

    public function datoCatalogo(): HasMany
    {
        return $this->hasMany(DatoCatalogo::class, 'ca_catalogo_id', 'id');
    }
}

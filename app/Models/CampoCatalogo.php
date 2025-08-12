<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CampoCatalogo extends Model
{
    protected $table = 'ca_campos_catalogos';
    protected $fillable = [
        'orden',
        'nombre',
        'tipo',
        'nullable',
        'longitud',
        'ca_catalogo_id',
    ];

    public function catalogo(): BelongsTo
    {
        return $this->belongsTo(Catalogo::class);
    }
    
}

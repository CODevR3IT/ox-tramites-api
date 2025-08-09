<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Estatus extends Model
{
    protected $table = 'ca_estatus';

    protected $fillable = [
        'descripcion',
        'asunto_correo',
        'contenido_correo',
        'estatus',
        'ca_tipo_estatus_id',
    ];
    
    protected $attributes = [
        'estatus'=>true,
    ];

    public function tipoEstatus(): BelongsTo
    {
        return $this->belongsTo(TipoEstatus::class);
    }
}

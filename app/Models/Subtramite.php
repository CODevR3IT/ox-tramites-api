<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subtramite extends Model
{
    protected $table = 'ca_subtramites';

    protected $fillable = [
        'descripcion',
        'detalle',
        'estatus',
        'is_cita',
        'is_pago',
        'config',
        'url_file',
        'files',
        'ca_tramite_id',
    ];
    protected $attributes = [
        'estatus'=>false,
        'is_cita'=>false,
        'is_pago'=>false,
    ];

    public function tramite(): BelongsTo
    {
        return $this->belongsTo(Tramite::class);
    }
}

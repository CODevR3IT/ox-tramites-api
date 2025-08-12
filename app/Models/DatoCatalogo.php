<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DatoCatalogo extends Model
{
    protected $table = 'ca_datos_catalogos';
    protected $fillable = [
        'datos',
        'ca_catalogo_id',
    ];

    public function catalogo(): BelongsTo
    {
        return $this->belongsTo(Catalogo::class);
    }
}

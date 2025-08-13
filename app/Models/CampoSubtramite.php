<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CampoSubtramite extends Model
{
    protected $cast = ['campos'=>"array"];
    protected $table = "ca_campos_subtramites";

    protected $fillable = [
        'campos',
        'estatus',
        'ca_subtramite_id',
    ];
    
    protected $attributes = [
        'estatus'=>false,
    ];

    public function subtramite(): BelongsTo
    {
        return $this->belongsTo(Subtramite::class);
    }
}

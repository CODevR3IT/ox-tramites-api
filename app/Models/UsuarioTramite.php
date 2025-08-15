<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Illuminate\Database\Eloquent\Model;

class UsuarioTramite extends Model
{
    protected $table = 'usuario_tramite';
    protected $fillable = [
        'user_id',
        'datos_tramite',
        //'ca_tramite_id',
        'ca_subtramite_id',
        'ca_estatus_id',
        'folio_seguimiento',
    ];
    protected $casts = ['datos_tramite'=>'array'];
    
    public function tramite(): BelongsTo
    {
        return $this->belongsTo(Tramite::class);
    }

    public function subtramite(): BelongsTo
    {
        return $this->belongsTo(Subtramite::class);
    }

    public function estatus(): BelongsTo
    {
        return $this->belongsTo(Estatus::class);
    }
}

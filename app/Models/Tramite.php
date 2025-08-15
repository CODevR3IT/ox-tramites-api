<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
//use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tramite extends Model
{
    protected $table = 'ca_tramites';
    //protected $dateFormat = 'U';
    protected $fillable = [
        'orden',
        'descripcion',
        'detalle',
        'estatus',
        'is_service',
        'tipo_usuarios_restringidos'
    ];
    protected $attributes = [
        'estatus'=>false,
        'is_service'=>false,
    ];

    public function subtramite(): HasMany
    {
        return $this->hasMany(Subtramite::class, 'ca_subtramite_id', 'id');
    }
    
    /*public function tipoUsuario(): BelongsTo
    {
        return $this->belongsTo(TipoUsuario::class);
    }*/
    
}

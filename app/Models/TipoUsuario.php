<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\Relations\HasMany;

class TipoUsuario extends Model
{
    protected $table = 'ca_tipo_usuarios';

    protected $fillable = [
        'tipo',
        'descripcion',
        'detalle',
        'estatus'
    ];

    protected $attributes = [
        'estatus' => false,
    ];

    /*public function tramite(): HasMany
    {
        return $this->hasMany(Tramite::class, 'ca_tipo_usuario_id', 'id');
    }*/
}

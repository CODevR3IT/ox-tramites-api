<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoEstatus extends Model
{
    protected $table = 'ca_tipos_estatus';

    protected $fillable = [
        'descripcion'
    ];
    
}

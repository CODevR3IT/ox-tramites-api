<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoCampo extends Model
{
    protected $table = 'ca_tipos_campos';

    protected $fillable = [
        'descripcion',
        'estatus'
    ];

    protected $attributes = [
        'estatus' => false,
    ];
}

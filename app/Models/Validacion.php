<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Validacion extends Model
{
    protected $table = 'ca_validaciones';

    protected $fillable = [
        'descripcion',
        'regex',
        'estatus'
    ];

    protected $attributes = [
        'estatus' => false,
    ];
}

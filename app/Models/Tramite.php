<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tramite extends Model
{
    protected $table = 'ca_tramites';
    //protected $dateFormat = 'U';
    protected $fillable = [
        'orden',
        'descripcion',
        'detalle',
        'estatus'
    ];
    protected $attributes = [
        'estatus'=>false,
    ];    
    
}

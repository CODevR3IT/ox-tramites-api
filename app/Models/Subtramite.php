<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
        'config'=>null,
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->attributes['config'] = json_encode(
                    ["numero_personas"=>1,
                    "tiempo_cita"=>15,
                    "dias_inhabiles" =>1,
                    "dias"=>[
                        ["descripcion"=>"Domingo","valor"=>0,"checked"=>false],
                        ["descripcion"=>"Lunes","valor"=>1,"checked"=>true],
                        ["descripcion"=>"Martes","valor"=>2,"checked"=>false],
                        ["descripcion"=>"Miércoles","valor"=>3,"checked"=>false],
                        ["descripcion"=>"Jueves","valor"=>4,"checked"=>false],
                        ["descripcion"=>"Viernes","valor"=>5,"checked"=>false],
                        ["descripcion"=>"Sábado","valor"=>6,"checked"=>false]
                    ],
                    "hora_min"=>"2020-04-21T09:00:00",
                    "hora_max"=>"2020-04-21T18:00:00"]);        
    }

    public function tramite(): BelongsTo
    {
        return $this->belongsTo(Tramite::class);
    }

    public function campoSubtramite(): HasMany
    {
        return $this->hasMany(CampoSubtramite::class, 'ca_subtramite_id', 'id');
    }
}

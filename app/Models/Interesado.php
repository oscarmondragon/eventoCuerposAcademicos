<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Interesado extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = [
        'area_id',
        'cuerpo_red_grupo',
        'representante_contacto',
        'nombre_interesado',
        'institucion',
        'puesto',
        'email',
        'telefono',
        'sector',
        'otro_sector',
        'interes',
        'motivos',
        'otro_motivo',
        'comentario'
    ];

}

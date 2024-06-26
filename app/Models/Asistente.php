<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Asistente extends Model
{
    use HasFactory, SoftDeletes, HasUuids;

    protected $fillable = [
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'email',
        'telefono',
        'lugar_origen',
        'dependencia',
        'tipo',
        'otro_tipo',
        'interes',
        'comentario'
    ];


}

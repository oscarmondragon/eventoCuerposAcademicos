<?php

namespace App\Models;

use App\Events\RegistroCreated;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Registro extends Model
{
    use HasFactory, HasUuids, SoftDeletes, Notifiable;

    protected $fillable = [
        'tipo_solicitante',
        'cuerpo_grupo_red',
        'productos_logrados',
        'casos_exito',
        'servicios_proyectos',
        'pais',
        'espacio_procedencia',
        'user_id',
        'aprobacion',
        'email',
        'telefono',
        'aceptoDatos',
        'adjuntoPago',

    ];

    protected $dispatchesEvents = [
        'created' => RegistroCreated::class,
    ];
}

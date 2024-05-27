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

    public function archivos()
    {
        return $this->hasMany(Archivo::class);
    }

    public function integrantes()
    {
        return $this->hasMany(Integrantes::class);
    }

    public function lineas()
    {
        return $this->hasMany(Linea::class);
    }

    public function area()
    {
        return $this->hasOne(AreaToRegistro::class);
    }

    public function subareas()
    {
        return $this->hasMany(SubareaToRegistro::class);
    }

    public function banner()
    {
        return $this->hasOne(Banner::class);
    }





}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoLider extends Model
{
    use HasFactory, HasUuids;

    protected $table = "tipos_lider";

    protected $fillable = [
        'nombre',
        'tipo_solicitante',
        'status'
    ];
}

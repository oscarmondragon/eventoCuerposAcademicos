<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subarea extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = [
        'area_id',
        'grupo_id',
        'nombre',
        'status'
    ];

    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id');
    }

    public function grupo()
    {
        return $this->belongsTo(Grupo::class, 'grupo_id');
    }
}

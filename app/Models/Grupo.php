<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = ['nombre', 'status'];

    public function subAreas()
    {
        return $this->hasMany(Subarea::class, 'grupo_id');
    }
}

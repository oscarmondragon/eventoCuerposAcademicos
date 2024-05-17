<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Area extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    public function subAreas()
    {
        return $this->hasMany(Subarea::class, 'area_tematica_id');
    }
}

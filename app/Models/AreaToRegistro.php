<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AreaToRegistro extends Model
{
    use HasFactory, HasUuids, SoftDeletes;


    protected $table = "areas_to_registros";


    public function area()
    {
        return $this->belongsTo(Area::class);
    }
}

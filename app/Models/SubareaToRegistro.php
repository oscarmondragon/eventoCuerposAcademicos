<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubareaToRegistro extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $table = "subareas_to_registros";

    public function subarea()
    {
        return $this->belongsTo(Subarea::class);
    }

}

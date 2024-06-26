<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    public function registro()
    {
        return $this->belongsTo(Registro::class);
    }

    public function area()
    {
        return $this->hasOne(Area::class);
    }


}

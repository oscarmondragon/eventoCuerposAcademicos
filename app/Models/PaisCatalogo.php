<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaisCatalogo extends Model
{
    use HasFactory, HasUuids, SoftDeletes;
    protected $table = "paises_catalogo";
}

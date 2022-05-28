<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Currency extends Model
{
    use HasFactory,softDeletes;

    protected $fillable = [
        'country_id',
        'name',
        'symbol',
        'code',
        'entities',
        'symbol_left',
        'decimal_place',
        'decimal_seprator',
        'thousand_operator',
    ];
}

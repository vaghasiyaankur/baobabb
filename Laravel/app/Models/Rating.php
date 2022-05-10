<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rating extends Model
{
    use HasFactory,SoftDeletes;

    Protected $fillable =[
        'parent_id',
        'user_to',
        'user_from',
        'rate',
        'review',
    ];

    public function rating()
    {
        $this->belongsTo(Rating::class,'parent_id','id');
    }
}

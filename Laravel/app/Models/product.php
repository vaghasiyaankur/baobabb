<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class product extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'category_id',
        'name',
        'image',
        'gallery',
        'video',
        'description',
        'meta_title',
        'meta_description',
        'country',
        'state',
        'city',
        'price',
        'sale_price',
        'impression',
        'click',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }
}

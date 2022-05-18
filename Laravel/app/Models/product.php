<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'category_id',
        'seller_id',
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
        'cash',
        'lat',
        'long',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}

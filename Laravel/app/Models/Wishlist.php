<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Wishlist extends Model
{
    use HasFactory,softDeletes;

    protected $fillable = [
        'product_id',
        'user_id'
    ];

    public function product()
    {
        $this->belongsTo(Product::class,'product_id','id');
    }

    public function user()
    {
        $this->belongsTo(User::class,'user_id','id');
    }
}

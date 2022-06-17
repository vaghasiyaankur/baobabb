<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'post_id',
        'filename',
        'position',
        'active',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class,'post_id','id');
    }


}

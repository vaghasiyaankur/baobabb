<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    
    Protected $fillable =[
        'id',
        'user_id',
        'from_user',
        'to_user',
        'message',
    ];

    
    /**
     * A message belong to a user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function fromUser()
    {
        return $this->belongsTo(User::class,'from_user','id');
    }

    public function toUser()
    {
        return $this->belongsTo(User::class,'to_user','id');
    }
}

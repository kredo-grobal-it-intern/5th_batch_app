<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $guarded = [];

    public function follower()
    {
        return $this->belongsTo(User::class, 'follower_id'); //select * from users where user_id = 2
    }
    public function following()
    {
        return $this->belongsTo(User::class, 'following_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'introduction'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin()
    {
        return $this->role == 1;
    }

    public function save_news()
    {
        return $this->hasMany(News::class);
    }

    // get all of the followers
    public function followers()
    {
        return $this->hasMany(Follow::class, 'following_id'); // select following_id from follows where follower_id = Auth::user()->id
    }

    public function following()
    {
        return $this->hasMany(Follow::class, 'follower_id'); // select * from follows where follower_id = Auth::user()->id
    }

    public function isFollowed()
    {
        return $this->followers()->where('follower_id', Auth::user()->id)->exists();
    }
}

<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    const ADMIN_ROLE_ID = 1;
    const USER_ROLE_ID = 2;
    const OWNER_ROLE_ID = 3;
    // use HasApiTokens, HasFactory, Notifiable, SoftDeletes;
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

    // public function posts()
    // {
    //     return $this->hasMany(Post::class);
    // }

    // // get all of the followers
    // public function followers()
    // {
    //     return $this->hasMany(Follow::class, 'following_id'); // select following_id from follows where follower_id = Auth::user()->id
    // }

    // public function following()
    // {
    //     return $this->hasMany(Follow::class, 'follower_id'); // select * from follows where follower_id = Auth::user()->id
    // }

    // public function isFollowed()
    // {
    //     return $this->followers()->where('follower_id', Auth::user()->id)->exists();
    // }
}

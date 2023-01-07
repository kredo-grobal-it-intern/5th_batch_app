<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'author',
        'image',
        'url',
        'news_type'

    ];

    // public function user(){
    //     return $this->belongsTo(User::class)->withTrashed();
    // }

    // public function save(){
    //     return $this->hasOne(Save::class);
    // }       

    // public function isSaved(){
    //     return $this->save()->where('user_id', Auth::user()->id)->exists();
    //     // select * from likes where user_id =  ???                // 🔼 true or false を返す
    // }   // => user_id という column名 にログイン者の id があれば true / 無ければ false                                            
    
}

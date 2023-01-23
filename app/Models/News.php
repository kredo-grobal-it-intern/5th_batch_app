<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'author',
        'image',
        'url',
        'news_type'

    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function saveNews( $options = Array()){
        return $this->hasMany(Save::class);
    }       

    public function isSaved(){
        return $this->saveNews()->where('user_id', Auth::user()->id)->exists();
    }                                        
    
}

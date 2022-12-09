<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Answer extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function question(){
        return $this->belongsTo(Question::class);
    }

    public function comments(){
        return $this->hasMany(AnswerComment::class);
    }

    public function answerLikes(){
        return $this->hasMany(AnswerReaction::class);
    }

    public function answerIsLiked(){
        return $this->answerLikes()->where('liked_by', Auth::user()->id)->exists();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnswerReaction extends Model
{
    use HasFactory;

    public function liked_by(){
        return $this->belongsTo(User::class);
    }

    public function answer(){
        return $this->belongsTo(Answer::class);
    }
}

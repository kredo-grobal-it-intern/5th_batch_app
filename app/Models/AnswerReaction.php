<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnswerReaction extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['liked_by','answer_id'];

    public function liked_by(){
        return $this->belongsTo(User::class);
    }

    public function answer(){
        return $this->belongsTo(Answer::class);
    }
}

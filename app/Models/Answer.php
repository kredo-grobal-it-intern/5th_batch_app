<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = ['body','image','user_id','question_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function question(){
        return $this->belongsTo(Question::class);
    }

    public function comments(){
        return $this->hasMany(AnswerComment::class);
    }

    public function userReaction(){
        return $this->answerReactions()->wherePivot('liked_by', Auth::id())->first();
    }

    public function answerReactions() {
        return $this->belongsToMany(User::class, 'answer_reactions', 'answer_id', 'liked_by');
        // belongsToMany('関係するモデル', '中間テーブルのテーブル名', '中間テーブル内で対応しているID名', '関係するモデルで対応しているID名');
    }
}

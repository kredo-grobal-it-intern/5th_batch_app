<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['title','image','user_id','content'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function createSelectedCategory(){
        return $this->hasMany(SelectedCategory::class);
    }

    public function selectedCategories(){
        // read for index
        return $this->belongsToMany(QuestionCategory::class, 'selected_categories', 'question_id', 'category_id');
    }

    public function answers(){
        return $this->hasMany(Answer::class);
    }

    public function IsSelectedBestAnswer(){
        return $this->answers()->where('best_answer', 1)->exists();
    }

    public function userReaction(){
        return $this->questionReactions()->wherePivot('liked_by', Auth::id())->first();
    }

    public function questionReactions() {
        return $this->belongsToMany(User::class, 'question_reactions', 'question_id', 'liked_by');
        // belongsToMany('関係するモデル', '中間テーブルのテーブル名', '中間テーブル内で対応しているID名', '関係するモデルで対応しているID名');
    }
}

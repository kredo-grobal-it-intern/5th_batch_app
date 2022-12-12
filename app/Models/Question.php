<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

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
}

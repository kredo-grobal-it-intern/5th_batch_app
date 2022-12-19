<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionCategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function selectedCategories(){
        return $this->hasMany(SelectedCategory::class);
    }
}

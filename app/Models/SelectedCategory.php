<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SelectedCategory extends Model
{
    use HasFactory;

    protected $table = 'selected_categories';
    protected $fillable = ['category_id','post_id'];

    public $timestamps = false;

    // public function questionCategory(){
    //     return $this->belongsTo(QuestionCategory::class);
    // }
}

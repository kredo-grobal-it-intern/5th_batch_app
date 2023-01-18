<?php

namespace App\Http\Controllers\qanda;

use App\Http\Controllers\Controller;
use App\Models\QuestionCategory;

class CategoryController extends Controller
{
    public function generateQuestionCategories()
    {
        $catArray = [
            'dog',
            'cat',
            'other animals',
            'lifestyle',
            'trainng',
            'food',
            'health',
            'other things',
        ];

        $arrayLen = count($catArray);
        for ($x = 0; $x < $arrayLen; $x++) :
            QuestionCategory::create([
                'name' => $catArray[$x]
            ]);
        endfor;
    }
}

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\qanda\QuestionController;
use App\Http\Controllers\qanda\CategoryController;
use App\Http\Controllers\qanda\AnswerController;
use App\Http\Controllers\qanda\AnswerCommentController;
use App\Http\Controllers\qanda\QuestionReactionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

#creating categories (When you want to add a new category, you can use this route)
Route::get('/categories',[CategoryController::class, 'generateQuestionCategories']);

Route::group(["middleware"=>"auth"], function() {
    #question
    Route::resource('/Q-A', QuestionController::class);
    Route::resource('/Answer', AnswerController::class);
    Route::resource('/Answer_Comment', AnswerCommentController::class);
    Route::resource('/Question_Reaction', QuestionReactionController::class);
});

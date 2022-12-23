<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\qanda\QuestionController;
use App\Http\Controllers\qanda\CategoryController;
use App\Http\Controllers\qanda\AnswerController;
use App\Http\Controllers\qanda\AnswerCommentController;
use App\Http\Controllers\qanda\QuestionReactionController;
use App\Http\Controllers\qanda\AnswerReactionController;

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
    Route::group(['prefix' => 'q-a', 'middleware' => 'verified'], function () {
        Route::resource('/questions', QuestionController::class);
        Route::resource('/answers', AnswerController::class);
        Route::resource('/answer_comment', AnswerCommentController::class);
        Route::resource('/question_reaction', QuestionReactionController::class);
        Route::resource('/answer_reaction', AnswerReactionController::class);
    });

    #Best answer
    Route::patch('/best_answer/{id}',[AnswerController::class, 'selectBestAnswer'])->name('SelectBestAnswer');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NewsController;

use App\Http\Controllers\qanda\QuestionController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\qanda\CategoryController;
use App\Http\Controllers\Admin\AdminEventController;


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




Route::resource('/article', ArticleController::class);
Route::resource('/pet-news', NewsController::class);


Route::group(["prefix"=>"pet-news", "as"=>"pet-news."],function(){
    Route::group(["prefix"=>"show", "as"=>"show."],function(){
        Route::get('/amusement', [NewsController::class, 'showAmusement']);
        Route::get('/cafe', [NewsController::class, 'showCafe']);
        Route::get('/dogrun', [NewsController::class, 'showDogrun']);
        Route::get('/hospital', [NewsController::class, 'showHospital']);
        Route::get('/result', [NewsController::class, 'search']);
    });
});

#creating categories (When you want to add a new category, you can use this route)
Route::get('/categories',[CategoryController::class, 'generateQuestionCategories']);

Route::group(["middleware"=>"auth"], function() {
    #question
    Route::resource('/Q-A', QuestionController::class);
});

Route::get('map', function () {
    return view('maps.index');
});

Route::get('map/all', function () {
    return view('maps.viewAll');
});

Route::get('map/saved', function () {
    return view('maps.saved');
});

// contact form
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'sendMail']);
Route::get('/contact/complete', [ContactController::class, 'complete'])->name('contact.complete');

// events
Route::get('/admin/events', [AdminEventController::class, 'index'])->name('admin.events.index');
Route::get('/admin/events/create', [AdminEventController::class, 'create'])->name('admin.events.create');
Route::post('/admin/events', [AdminEventController::class, 'store'])->name('admin.events.store');

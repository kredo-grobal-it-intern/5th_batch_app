<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\qanda\QuestionController;
use App\Http\Controllers\qanda\CategoryController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\FindController;
use App\Http\Controllers\PublicationController;


use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NewsController;

use App\Http\Controllers\qanda\QuestionController;
use App\Http\Controllers\qanda\CategoryController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(["middleware" => "auth"], function () {
    #try checkout
    Route::get('/', function () {
        return view('welcome');
    });

        #creating categories (When you want to add a new category, you can use this route)
    Route::get('/categories',[CategoryController::class, 'generateQuestionCategories']);
        #question
    Route::resource('/Q-A', QuestionController::class);


    #Help_animal_top
    Route::name('help_animal_top.')
    ->group (function () {
    Route::get('/help_animal_top', [DonationController::class, 'index'])->name('index');
    });

    #Donation by Credit Card
    Route::name('card.')
    ->group (function () {
    Route::get('/card',[CardController::class,'index'])->name('index');
    Route::get('/card/pay',[CardController::class,'pay'])->name('pay');
    Route::post('/card/pay_price',[CardController::class,'pay_price'])->name('pay_price');
    });

    #Find animal
    Route::name('find_animal.')
    ->group (function () {
    Route::get('/find_animal/index',[FindController::class,'index'])->name('index');
    Route::get('/find_animal/confirm',[FindController::class,'confirm'])->name('confirm');
    Route::get('/find_animal/completed',[FindController::class,'completed'])->name('completed');
   });

   Route::name('find_animal.')
   ->group (function () {
       Route::resource('/find_animal',FindController::class);
   });

     #Request Publication
     Route::name('publication.')
     ->group (function () {
        Route::get('/publication',[PublicationController::class,'index'])->name('index');
        Route::post('/publication/request',[PublicationController::class,'request'])->name('request');
        //store  function
        Route::get('/publication/input',[PublicationController::class,'input'])->name('input');
        Route::get('/publication/confirm',[PublicationController::class,'confirm'])->name('confirm');
        Route::get('/publication/completed',[PublicationController::class,'completed'])->name('completed');
     });

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
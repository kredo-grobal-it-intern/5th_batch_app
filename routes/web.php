<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NewsController;

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

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route::get('/amusement', function () {
//     return view('useful-info.articles.All-articles.amusement');
// });
// Route::get('/cafe', function () {
//     return view('useful-info.articles.All-articles.cafe');
// });
// Route::get('/dogrun', function () {
//     return view('useful-info.articles.All-articles.dogrun');
// });
// Route::get('/hospital', function () {
//     return view('useful-info.articles.All-articles.hospital');
// });


Route::get('/saved', function () {
    return view('useful-info.articles.saved');
});



Route::resource('/article', ArticleController::class);
Route::resource('/pet-news', NewsController::class);


// Route::get('/pet-news', [NewsController::class, 'index']);
// Route::get('/pet-news/show', [NewsController::class, 'show']);

// Route::get('/pet-news/show/hospital', [NewsController::class, 'showHospital']);
// Route::get('/pet-news/show/hospital', [NewsController::class, 'showHospital']);
// Route::get('/pet-news/show/hospital', [NewsController::class, 'showHospital']);
// Route::get('/pet-news/show/hospital', [NewsController::class, 'showHospital']);

Route::group(["prefix"=>"pet-news", "as"=>"pet-news."],function(){
    // Route::get('/index', [NewsController::class, 'index']);
    // Route::get('/show/{id}', [NewsController::class, 'show']);

    Route::group(["prefix"=>"show", "as"=>"show."],function(){
        Route::get('/amusement', [NewsController::class, 'showAmusement']);
        Route::get('/cafe', [NewsController::class, 'showCafe']);
        Route::get('/dogrun', [NewsController::class, 'showDogrun']);
        Route::get('/hospital', [NewsController::class, 'showHospital']);
        Route::get('/result', [NewsController::class, 'search']);
    });
});
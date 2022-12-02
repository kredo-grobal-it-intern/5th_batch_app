<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;

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
Route::get('/useful', function () {
    return view('useful-info.articles.allArticles');
});

// Route::group(["middleware"=>"auth"], function () {
    // Route::get('/categories', [CategoryController::class, 'generateCategories']);
    // Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
    // Route::post('/search', [App\Http\Controllers\HomeController::class, 'search'])->name('search');

    Route::resource('/article', ArticleController::class);
    // Route::resource('/comments', CommentController::class);
    // Route::resource('/profile', ProfileController::class);
    // Route::resource('/follow', FollowController::class);
    // Route::resource('/like', LikeController::class)->except('index');

//    Route::group(["prefix"=>"admin", "as"=>"admin."],function(){
//         Route::resource('/users',UsersController::class); //admin.users.show
//         Route::resource('/posts',PostsController::class); //admin.users.show
//         Route::resource('/categories',CategoriesController::class); //admin.users.show
//    });
// });
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;

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

Route::group(["auth" => "middleware"], function () {

    // profile ----------------------------------------------------------------
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/', [PostsController::class, 'index'])->name('users.post.index');
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'show'])->name('users.profile.show');
    Route::get('/users/edit', [App\Http\Controllers\UsersController::class, 'edit']);
    Route::post('/users/update', [App\Http\Controllers\UsersController::class, 'update']);
    Route::get('/users/{id}', [App\Http\Controllers\UsersController::class, 'show'])->name('users.profile.show'); // Pay attention to order
    // profile ----------------------------------------------------------------

});


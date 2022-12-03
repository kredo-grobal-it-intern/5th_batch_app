<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\FindController;
use App\Http\Controllers\PublicationController;
use App\Models\Donation;


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
Route::group(["middleware" => "auth"], function () {
    #try checkout
    Route::get('/', function () {
        return view('welcome');
    });

    Route::post('webhook',function(Request $request){
        if($request->type === 'charge.succeeded'){

        try{
        Donation::create([
            'amount' => $request->data['object']['amount']
         ]);
        }catch(\Exception $e) {
        return $e->getMessage();
        }
    };
  });

    #Help_animal_top
    Route::name('help_animal_top.')
    ->group (function () {
    Route::get('/help_animal_top', [DonationController::class, 'index'])->name('index');
    });

    #Donation by Credit Card
    Route::name('card.')
    ->group (function () {
    Route::get('/card',[CardController::class,'index'])->name('index');
    Route::get('/card/checkout',[CardController::class,'checkout'])->name('checkout');
    Route::get('/card/pay',[CardController::class,'pay'])->name('pay');
    Route::post('/card/pay_price',[CardController::class,'pay_price'])->name('pay_price');
    Route::get('/card/success',[CardController::class,'success'])->name('success');
    });
    Route::delete('/card/{id}/destroy', [CardController::class,'destroy'])->name('card.destroy');
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



//     Route::get('/donate3',[DonationController::class,'index3'])->name('donate.index3');

// Route::resource('/donate', DonationController::class)->except('index');


//Donation_Credit Card
// Route::group(['prefix' => 'post', 'as' => 'post.'], function(){
//     Route::get('/create', [PostController::class, 'create'])->name('create');
//     Route::post('/store', [PostController::class, 'store'])->name('store');
//     Route::get('/{id}/show', [PostController::class, 'show'])->name('show');
//     Route::get('/{id}/edit', [PostController::class, 'edit'])->name('edit');
//     Route::patch('/{id}/update', [PostController::class, 'update'])->name('update');
//     Route::delete('/{id}/destroy', [PostController::class, 'destroy'])->name('destroy');
// });

//Comment
// Route::group(['prefix' => 'comment', 'as' => 'comment.'], function(){
//     Route::post('/{post_id}/store', [CommentController::class, 'store'])->name('store');
// });

//User
// Route::group(['prefix' => 'profile', 'as' => 'profile.'], function(){
//     Route::get('/', [UserController::class, 'show'])->name('show');
// });



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

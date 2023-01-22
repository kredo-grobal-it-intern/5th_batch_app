<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CardController;
use App\Http\Controllers\FindController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SaveController;

use App\Http\Controllers\ContactController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminEventController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\qanda\AnswerController;
use App\Http\Controllers\qanda\CategoryController;
use App\Http\Controllers\qanda\QuestionController;
use App\Http\Controllers\qanda\AnswerCommentController;
use App\Http\Controllers\qanda\AnswerReactionController;
use App\Http\Controllers\qanda\QuestionReactionController;
use App\Http\Controllers\post\PostsController;
use App\Http\Controllers\post\CommentsController;
use App\Http\Controllers\post\LikesController;

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
    return view('top');
});

#creating categories (When you want to add a new category, you can use this route)
Route::get('/categories', [CategoryController::class, 'generateQuestionCategories']);

Route::resource('/pet-news', NewsController::class);

Route::group(["prefix" => "pet-news", "as" => "pet-news."], function () {
    Route::group(["prefix" => "show", "as" => "show."], function () {
        Route::get('/amusement', [NewsController::class, 'showAmusement']);
        Route::get('/cafe', [NewsController::class, 'showCafe']);
        Route::get('/dogrun', [NewsController::class, 'showDogrun']);
        Route::get('/hospital', [NewsController::class, 'showHospital']);
        Route::get('/result', [NewsController::class, 'search']);
    });

    Route::resource('/save', SaveController::class)->except('index');
});

Route::group(["middleware" => "auth"], function () {
    #Post
    Route::group(['prefix' => 'post', 'middleware' => 'verified'], function (){
        Route::resource('/post', PostsController::class)->except('show', 'edit');
        Route::resource('/comments', CommentsController::class);
        Route::resource('/likes', LikesController::class);
    });

    #Q&A
    Route::group(['prefix' => 'q-a', 'middleware' => 'verified'], function () {
        Route::resource('/questions', QuestionController::class);
        Route::resource('/answers', AnswerController::class);
        Route::resource('/answer_comment', AnswerCommentController::class);
        Route::resource('/question_reaction', QuestionReactionController::class);
        Route::resource('/answer_reaction', AnswerReactionController::class);
    });

    #Best answer
    Route::patch('/best_answer/{id}', [AnswerController::class, 'selectBestAnswer'])->name('SelectBestAnswer');

});


Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('map', function () {
    return view('maps.map');
});

    #Help_animal_top
    Route::name('animal_care.')
    ->group(function () {
        Route::get('/animal_care', [DonationController::class, 'index'])->name('index');
    });

    Route::get('map/saved', function () {
        return view('maps.saved');
    });

// contact form
    Route::get('/contact', [ContactController::class, 'index'])->name('contact');
    Route::post('/contact', [ContactController::class, 'sendMail']);
    Route::get('/contact/complete', [ContactController::class, 'complete'])->name('contact.complete');

// events
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth.admin'], function () {
        // events
        Route::resource('/events', AdminEventController::class)->except('show');

        // User Management
        Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
            Route::get('/create', [UserController::class, 'create'])->name('create');
            Route::post('/', [UserController::class, 'store'])->name('store');
        });
    });

// Admin Auth
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    #Donation by Credit Card
    Route::name('card.')
    ->group(function () {
        Route::get('/card', [CardController::class, 'index'])->name('index');
        Route::get('/card/pay', [CardController::class, 'pay'])->name('pay');
        Route::post('/card/pay_price', [CardController::class, 'pay_price'])->name('pay_price');
    });

    #Find animal
    Route::name('find_animal.')
    ->group(function () {
        Route::get('/find_animal/index', [FindController::class, 'index'])->name('index');
        Route::get('/find_animal/confirm', [FindController::class, 'confirm'])->name('confirm');
        Route::get('/find_animal/completed', [FindController::class, 'completed'])->name('completed');
        Route::get('/find_animal/search', [FindController::class, 'search'])->name('search');
        Route::get('/find_animal/category_search', [FindController::class, 'category_search'])->name('category_search');
    });

    Route::name('find_animal.')
    ->group(function () {
        Route::resource('/find_animal', FindController::class);
    });

    #Request Publication
    Route::name('publication.')
    ->group(function () {
        Route::get('/publication', [PublicationController::class, 'index'])->name('index');
        Route::post('/publication/request', [PublicationController::class, 'request'])->name('request');
        //store  function
        Route::get('/publication/input', [PublicationController::class, 'input'])->name('input');
        Route::delete('/publication/{id}/destroy', [PublicationController::class, 'destroy'])->name('destroy');
        Route::get('/publication/confirm', [PublicationController::class, 'confirm'])->name('confirm');
        Route::get('/publication/completed', [PublicationController::class, 'completed'])->name('completed');
        Route::get('/publication/{id}/show', [PublicationController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [PublicationController::class, 'edit'])->name('edit');
        Route::patch('/{id}/update', [PublicationController::class, 'update'])->name('update');
    });




    Route::group(["prefix" => "pet-news", "as" => "pet-news."], function () {
        Route::resource('/', NewsController::class);

        Route::group(["prefix" => "show", "as" => "show."], function () {
            Route::get('/amusement', [NewsController::class, 'showAmusement']);
            Route::get('/cafe', [NewsController::class, 'showCafe']);
            Route::get('/dogrun', [NewsController::class, 'showDogrun']);
            Route::get('/hospital', [NewsController::class, 'showHospital']);
            Route::get('/result', [NewsController::class, 'search']);
        });
    });

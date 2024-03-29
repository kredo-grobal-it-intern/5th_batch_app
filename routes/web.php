<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CardController;
use App\Http\Controllers\FindController;
use App\Http\Controllers\User_inputController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SaveController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\qanda\AnswerController;
use App\Http\Controllers\qanda\CategoryController;
use App\Http\Controllers\qanda\QuestionController;
use App\Http\Controllers\Admin\AdminEventController;
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
        Route::get('/all_saved', [NewsController::class, 'showSaved'])->name('saved');
    });

    Route::resource('/save', SaveController::class)->except('index');
});

Route::group(["middleware" => "auth"], function () {
    #Post


    Route::group(['middleware' => 'verified'], function (){

        #search
        Route::get('posts/search', [PostsController::class, 'search'])->name('posts.search');
        
        Route::resource('/posts', PostsController::class)->except('edit');
        Route::resource('posts.comments', CommentsController::class);
        // Route::resource('posts.likes', LikesController::class);
        Route::post('posts/{post}/likes', [LikesController::class, 'store'])->name('posts.likes.store');
        Route::delete('posts/{post}/likes', [LikesController::class, 'destroy'])->name('posts.likes.destroy');

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

    // profile
    Route::resource('/profile', ProfileController::class)->except('index');
    Route::resource('/follow', FollowController::class)->except('index');
    // followers
    Route::get('/profile/{id}/followers', [ProfileController::class, 'followers'])->name('profile.followers');
    Route::get('/profile/{id}/following', [ProfileController::class, 'following'])->name('profile.following');
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
        Route::get('/find_animal/{id}/contact', [FindController::class, 'contact'])->name('contact');
        Route::get('/find_animal/{id}/contact_input', [FindController::class, 'contact_input'])->name('contact_input');
        Route::patch('/find_animal/{id}/input_user', [User_inputController::class, 'input_user'])->name('input_user');
        Route::get('/find_animal/confirm', [FindController::class, 'confirm'])->name('confirm');
        Route::get('/find_animal/completed', [FindController::class, 'completed'])->name('completed');
        Route::get('/find_animal/search', [FindController::class, 'search'])->name('search');
        Route::get('/find_animal/category_search', [FindController::class, 'category_search'])->name('category_search');
        Route::get('/find_animal/search_area', [FindController::class, 'search_area'])->name('search_area');
    });

    Route::name('user_input.')
    ->group(function () {
        Route::get('/user_input/{id}/confirm', [User_inputController::class, 'confirm'])->name('confirm');
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

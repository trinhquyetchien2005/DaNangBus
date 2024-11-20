<?php
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;


Route::group(['prefix' => 'auth'], function () {
    Route::get('/login', function () {
        return view('client.auth.login');
    })->name('login');

    Route::get('/register', function () {
        return view('client.auth.register');
    })->name('register');

    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
});

Route:: group([],function () {
    Route::match(['get', 'post', 'put', 'delete'], '/pages/home', function () {
        return view('client.pages.home');
    })->name('home.pages');
    
    Route::get('/', function () {
        return view('client.pages.home');
    })->name('home');
    
    Route::post('/search', [SearchController::class, 'search'])->name('search');
    
    
    Route::get('pages/post', [PostController::class, 'show'])->name('post.pages');

    Route::get('/post/{id}', [PostController::class, 'getPost'])->name('post.view');

    Route::match (['get', 'post', 'put', 'delete'], 'pages/map', function () {
        return view('client.pages.map');
    })->name('map.pages');

    Route::get('pages/contact', function (){
        return view('client.pages.contact');
    })->name('contact.pages');

    Route::post('pages/contact', [ContactController::class, 'FeedBack'])->name('contact.feedback');

    Route::get('pages/ticket', function (){
        return view('client.pages.ticket');
    })->name('ticket.pages');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('pages/account', function (){
        return view('client.pages.account');
    })->name('account.pages');
});

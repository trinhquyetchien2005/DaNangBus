<?php
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

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
    
    Route::match (['get', 'post', 'put', 'delete'], 'pages/news', function () {
        return view('client.pages.news');
    })->name('news.pages');

    Route::match (['get', 'post', 'put', 'delete'], 'pages/map', function () {
        return view('client.pages.map');
    })->name('map.pages');
});

Route::group(['middleware' => 'auth'], function () {
    
});

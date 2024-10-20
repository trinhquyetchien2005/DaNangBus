<?php

use App\Http\Controllers\Auth\AuthController;

// Route cho trang chủ
Route::get('/', function(){
    return view('pages.home');
});

Route::get('/home', function(){
    return view('pages.home');
})->name('home');

Route::get('/ticket', function () {
    return view('pages.ticket'); // Tạo file about.blade.php
})->name('ticket');
Route::get('/map', function () {
    return view('pages.map'); // Tạo file about.blade.php
})->name('map');
Route::get('/news', function () {
    return view('pages.news'); // Tạo file about.blade.php
})->name('news');
Route::get('/account', function () {
    return view('account.news'); // Tạo file about.blade.php
})->name('account');

// Route GET cho trang liên hệ
Route::get('/contact', function () {
    return view('pages.contact'); // Tạo file contact.blade.php
})->name('contact');

// Route GET cho trang đăng nhập
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('regsiter');

// Route::get('/verify', function () {
//     return view('auth.verify');
// })->name('verify');

Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::post('/register', [AuthController::class, 'register'])->name('register');

// Route::get('/verify', [AuthController::class, 'verify'])->name('verify');

// Route::post('/verify/code', [AuthController::class, 'verifyCode'])->name('verify.code');


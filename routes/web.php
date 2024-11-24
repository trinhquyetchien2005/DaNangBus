<?php
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\BusRouteController;
use App\Http\Controllers\OTPController;
use App\Http\Controllers\AccountController;


Route::group(['prefix' => 'auth'], function () {
    Route::get('/login', function () {
        return view('client.auth.login');
    })->name('login');

    Route::get('/register', function () {
        return view('client.auth.register');
    })->name('register');

    Route::get('/verify', function () {
        return view('client.auth.verify');
    })->name('verify');

    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/otp/send', [OTPController::class, 'sendOtp'])->name('otp.send');
    Route::post('/otp/resend', [OTPController::class, 'resendOtp'])->name('otp.resend');
    Route::get('/otp/verify', [OTPController::class, 'showVerifyForm'])->name('otp.verify');
    Route::post('/otp/verify', [OTPController::class, 'verifyOtp'])->name('otp.verify.submit');

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

    Route::get('/account', [AccountController::class, 'show'])->name('account.show');
    Route::post('/account/update', [AccountController::class, 'update'])->name('account.update');

    Route::get('pages/ticket', [TicketController::class, 'checkTicket'])->name('ticket.view');

    Route::get('pages/ticket/registration', function (){
        return view('client.pages.ticket_registration');
    })->name('ticket.view')->middleware('check.ticket');

    Route::post('pages/ticket/registration', [TicketController::class, 'registration'])->name('ticket.registration');
    Route::post('pages/ticket', [PaymentController::class, 'direct'])->name('payment.process');

    Route::get('ticket', [TicketController::class, 'getTicket'])->name('ticket.pages')->middleware('auth');
    
});

Route::prefix('ticket')->name('ticket.')->group(function () {
    Route::delete('/cancel/{ticket}', [TicketController::class, 'cancel'])->name('cancel');
});

Route::get('/route-details', [BusRouteController::class, 'getRouteDetails']);



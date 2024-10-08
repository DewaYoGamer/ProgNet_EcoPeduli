<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('index');
});

Route::get('/schedule', function () {
    return view('schedule');
});

Route::get('/exchange', function () {
    return view('exchange');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/educate', function () {
    return view('educate');
});

Route::get('/test', function () {
    return view('test');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/pengguna', function () {
    return view('dashboard.dashboard_pengguna');
});

Route::get('/forgot', function () {
    return view('auth.forgot');
});

Route::get('/verification', function () {
    return view('auth.verification');
});

Route::get('/new_password', function () {
    return view('auth.new_password');
});

Route::get('/succes_change', function () {
    return view('auth.succes_change');
});

// Mencoba Database
Route::post('/register', [RegisterController::class, 'store']);
Route::post('/login', [LoginController::class, 'authenticate']);
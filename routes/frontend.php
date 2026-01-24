<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Frontend Public Pages
|--------------------------------------------------------------------------
*/
Route::get('/', fn () => view('frontend.home'));

/*
|--------------------------------------------------------------------------
| Frontend Auth (Guest Only)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {

    Route::get('/login', fn () => view('auth.frontend.login'))
        ->name('login');

    Route::get('/register', fn () => view('auth.frontend.register'))
        ->name('register');

    Route::get('/forgot-password', fn () => view('auth.frontend.forgot-password'))
        ->name('password.request');

    Route::get('/reset-password/{token}', function (Request $request) {
        return view('auth.frontend.reset-password', [
            'request' => $request
        ]);
    })->name('password.reset');
});

/*
|--------------------------------------------------------------------------
| Frontend Authenticated User
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', fn () => view('frontend.dashboard'))
        ->name('dashboard');

    Route::post('/logout', function () {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/login');
    })->name('logout');
});

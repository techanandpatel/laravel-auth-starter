<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('frontend.home'));

/*
|--------------------------------------------------------------------------
| Authenticated User Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('frontend.home');
    });

    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', function () {
            return view('backend.dashboard');
        });
    });

});

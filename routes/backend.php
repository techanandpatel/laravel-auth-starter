<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Admin Auth (Guest Only)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {

    Route::get('/login', fn () => view('auth.backend.login'))
        ->name('admin.login');

    Route::get('/forgot-password', fn () => view('auth.backend.forgot-password'))
        ->name('admin.password.request');

    Route::get('/reset-password/{token}', function (Request $request) {
        return view('auth.backend.reset-password', [
            'request' => $request
        ]);
    })->name('admin.password.reset');
});

/*
|--------------------------------------------------------------------------
| Admin Authenticated
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'permission:access admin'])->group(function () {

    Route::get('/dashboard', fn () => view('backend.dashboard'))
        ->name('admin.dashboard');

    Route::post('/logout', function () {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/admin/login');
    })->name('admin.logout');
});

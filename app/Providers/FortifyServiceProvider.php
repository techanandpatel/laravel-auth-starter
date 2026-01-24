<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Models\User;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Actions\RedirectIfTwoFactorAuthenticatable;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        /*
        |--------------------------------------------------------------------------
        | Fortify Actions
        |--------------------------------------------------------------------------
        */
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);
        Fortify::redirectUserForTwoFactorAuthenticationUsing(
            RedirectIfTwoFactorAuthenticatable::class
        );

        /*
        |--------------------------------------------------------------------------
        | Fortify Views (Blade)
        |--------------------------------------------------------------------------
        */
        /*
        |--------------------------------------------------------------------------
        | Login View
        |--------------------------------------------------------------------------
        */
        Fortify::loginView(function () {
            return request()->is('admin/*')
                ? view('auth.backend.login')
                : view('auth.frontend.login');
        });
        Fortify::registerView(fn() => view('auth.register'));

    /*
    |--------------------------------------------------------------------------
    | Register View (Frontend ONLY)
    |--------------------------------------------------------------------------
    */
        Fortify::registerView(fn() => view('auth.frontend.register'));

    /*
    |--------------------------------------------------------------------------
    | Forgot Password View
    |--------------------------------------------------------------------------
    */
        Fortify::requestPasswordResetLinkView(function () {
            return request()->is('admin/*')
                ? view('auth.backend.forgot-password')
                : view('auth.frontend.forgot-password');
        });

    /*
    |--------------------------------------------------------------------------
    | Reset Password View
    |--------------------------------------------------------------------------
    */
        Fortify::resetPasswordView(function ($request) {
            return request()->is('admin/*')
                ? view('auth.backend.reset-password', ['request' => $request])
                : view('auth.frontend.reset-password', ['request' => $request]);
        });

        /*
        |--------------------------------------------------------------------------
        | Custom Authentication Logic
        |--------------------------------------------------------------------------
        */
        Fortify::authenticateUsing(function (Request $request) {
            $user = User::where('email', $request->email)->first();

            if ($user && Hash::check($request->password, $user->password)) {
                return $user;
            }

            return null;
        });

        /*
        |--------------------------------------------------------------------------
        | Rate Limiting
        |--------------------------------------------------------------------------
        */
        RateLimiter::for('login', function (Request $request) {
            $key = Str::transliterate(
                Str::lower($request->input(Fortify::username())) . '|' . $request->ip()
            );

            return Limit::perMinute(5)->by($key);
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by(
                optional($request->session())->get('login.id')
            );
        });
    }
}

<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\CustomAuthentication;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Contracts\LoginResponse;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $request = request();
        if ($request->is('admin/*')) {
            Config::set('fortify.guard', 'admin');
            Config::set('fortify.passwords', 'admins');
            Config::set('fortify.prefix', 'admin');
//            Config::set('fortify.home', '/dashboard');

        }


            $this->app->instance(LoginResponse::class, new class implements LoginResponse {
                public function toResponse($request)
                {
                    if ($request->user('admin'))
                        return redirect()->intended('/dashboard');
                    return redirect()->intended('/');
                }
            });





    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

//        Fortify::redirects('login', '/');
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        RateLimiter::for('login', function (Request $request) {
            $throttleKey = Str::transliterate(Str::lower($request->input(Fortify::username())) . '|' . $request->ip());

            return Limit::perMinute(5)->by($throttleKey);
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });

        Fortify::viewPrefix('auth.');


        // Check if the guard is admin to set the view prefix
        if (\config('fortify.guard') === 'admin') {
            Fortify::authenticateUsing([new CustomAuthentication, 'authenticate']); //callback function to authenticate the user for custom authentication
            Fortify::viewPrefix('auth.'); //go to resources/views/auth
        }
        else {
            Fortify::viewPrefix('front.auth.'); //go to resources/views/front/auth
        }

        //custom authentication with fortify


    }
}

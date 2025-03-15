<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Gate::define('role', function ($user, ...$roles) {

        //     return in_array($user->role->name, $roles);
        // });
        Gate::define('super-admin', function ($user) {
            return $user->id === 1;
        });
        Blade::if('role', function (...$roles) {
            return Auth::user()->hasAnyRole($roles);
        });
        // Blade::if('role', fn($expression) => Auth::user()->hasAnyRole([$expression]));
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Blade::directive()
        //
    }
}

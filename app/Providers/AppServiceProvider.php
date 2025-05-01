<?php

namespace App\Providers;

use Hashids\Hashids;
use App\Models\Manuscript;
use App\Models\ManuscriptTracker;
use App\Policies\ManuscriptTracking;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;
use App\helpers\getLatestManuscriptId;
use App\helpers\ManuscriptIdGenerator;
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
        Gate::define('viewUser', [ManuscriptTracking::class, 'view']);
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
        if (session()->has('manuscript_id')) {
            $manuscript = session('manuscript_id');
        } else {
            $IdGenerator = new ManuscriptIdGenerator();
            $manuscript = $IdGenerator->getLatestId();
            session(['manuscript_id' => $manuscript]);
        }
        View::composer(['submission.manuscriptlayout'], function ($view) {
            $manuscript = session('manuscript_id');

            $view->with('manuscript', $manuscript);
        });
    }
}

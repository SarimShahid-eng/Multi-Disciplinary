<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }
    public function boot(): void
    {
        $this->mapWebRoutes();
        $this->mapAdminRoutes();
    }
    protected function mapWebRoutes(): void
    {
        Route::middleware(['web', 'loadRoles'])
            ->group(base_path('routes/web.php'));
    }

    protected function mapAdminRoutes(): void
    {
        Route::middleware('web')
            ->prefix('admin')
            ->group(base_path('routes/admin-auth.php'));
    }
    /**
     * Bootstrap services.
     */
}

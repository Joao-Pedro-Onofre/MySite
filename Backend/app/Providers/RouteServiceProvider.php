<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // If your framework has the routes() helper (Laravel 8+), use it:
        if (method_exists($this, 'routes')) {
            $this->routes(function () {
                // API routes -> /api prefix, "api" middleware (no CSRF)
                if (file_exists(base_path('routes/api.php'))) {
                    Route::prefix('api')
                        ->middleware('api')
                        ->group(base_path('routes/api.php'));
                }

                // Web routes -> "web" middleware (CSRF)
                Route::middleware('web')
                    ->group(base_path('routes/web.php'));
            });
            return;
        }

        // Fallback for older Laravel: register groups directly
        if (file_exists(base_path('routes/api.php'))) {
            Route::prefix('api')->middleware('api')->group(base_path('routes/api.php'));
        }
        Route::middleware('web')->group(base_path('routes/web.php'));
    }
}

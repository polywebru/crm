<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/';

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    protected $authNamespace = 'App\\Http\\Controllers\\Auth';
    protected $apiNamespace = 'App\\Http\\Controllers\\Api';
    protected $adminApiNamespace = 'App\\Http\\Controllers\\Api\\Admin';
    protected $userApiNamespace = 'App\\Http\\Controllers\\Api\\User';

    public function boot()
    {
        $this->configureRateLimiting();
    }

    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }

    public function map()
    {
        $this->mapAuthRoutes();
        $this->mapApiRoutes();
        $this->mapUserApiRoutes();
        $this->mapAdminApiRoutes();
    }

    public function mapAuthRoutes()
    {
        Route::middleware(['api'])
            ->namespace($this->authNamespace)
            ->group(base_path('/routes/auth.php'));
    }

    public function mapApiRoutes()
    {
        Route::middleware(['api', 'auth'])
            ->namespace($this->apiNamespace)
            ->group(base_path('/routes/api.php'));
    }

    public function mapUserApiRoutes()
    {
        Route::prefix('api/v1')
            ->middleware(['api', 'auth'])
            ->namespace($this->userApiNamespace)
            ->group(base_path('routes/api/user.php'));
    }

    public function mapAdminApiRoutes()
    {
        Route::prefix('api/v1/admin')
            ->middleware(['api', 'auth'])
            ->namespace($this->adminApiNamespace)
            ->name('admin.')
            ->group(base_path('/routes/api/admin.php'));
    }
}

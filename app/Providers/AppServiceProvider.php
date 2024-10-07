<?php

namespace App\Providers;

use App\Http\Requests\CustomLoginRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Http\Requests\LoginRequest;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(LoginRequest::class, CustomLoginRequest::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::before(static function ($user, $ability) {
            return $user->hasRole('super admin') ? true : null;
        });
    }
}

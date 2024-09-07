<?php

namespace App\Providers;

use App\View\Composers\Categories;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
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
        View::composer('layouts.home', Categories::class);
        View::composer('home.index', Categories::class);
    }
}

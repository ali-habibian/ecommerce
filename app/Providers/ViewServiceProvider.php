<?php

namespace App\Providers;

use App\View\Composers\Categories;
use App\View\Composers\Products;
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
        View::composer('layouts.customer.home', Categories::class);
        View::composer('home.index', Categories::class);
        View::composer('home.index', Products::class);
    }
}

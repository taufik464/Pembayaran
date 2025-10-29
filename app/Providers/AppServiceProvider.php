<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
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
        Paginator::useTailwind();
        \Illuminate\Support\Facades\View::composer('layouts.navbar', function ($view) {
            $view->with('kategoriInformasis', \App\Models\Category::all());
        });
    }
}

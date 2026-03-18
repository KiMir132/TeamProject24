<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        \Illuminate\Support\Facades\View::composer('*', function ($view) {
            $navTypes = \App\Models\Product::select('Type')->distinct()->orderBy('Type')->pluck('Type');
            $view->with('navTypes', $navTypes);
        });

        \Illuminate\Pagination\Paginator::defaultView('pagination::tailwind');
    }
}
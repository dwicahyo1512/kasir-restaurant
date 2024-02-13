<?php

namespace App\Providers;

use App\View\Composer\SidebarComposer;
use App\View\Composer\MainComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
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
        View::composer('*', SidebarComposer::class);
        View::composer('*', MainComposer::class);
    }
}

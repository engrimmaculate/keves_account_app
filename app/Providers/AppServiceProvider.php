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
        // "Froiden\LaravelInstaller\Providers\LaravelInstallerServiceProvider::class";
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Paginator::useBootstrapFive(); // For Bootstrap 5
        // Paginator::useBootstrapFour(); // For Bootstrap 4
	    // Paginator::useBootstrapThree(); // For Bootstrap 3
    }
}

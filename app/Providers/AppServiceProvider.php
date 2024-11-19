<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Http\View\Composers\StatistikComposer;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Daftarkan view composer
        View::composer('*', StatistikComposer::class);
    }
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    public function home()
    {
        return route('dashboard');
    }

    /**
     * Bootstrap any application services.
     */
    // public function boot(): void
    // {
    //     //
    // }
}

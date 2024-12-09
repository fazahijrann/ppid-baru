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
        setlocale(LC_TIME, 'id_ID.UTF-8');
        \Carbon\Carbon::setLocale('id');
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

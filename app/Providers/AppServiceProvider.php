<?php

namespace App\Providers;

use App\Models\Event;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

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
        Route::bind('event', function ($value) {
            return Event::where('id_event', $value)->firstOrFail();
        });
    }
}

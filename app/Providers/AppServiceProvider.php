<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Race;
use App\Models\Horse;
use App\Observers\RaceObserver;
use App\Observers\HorseObserver;

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
        Paginator::useBootstrap();
        Race::observe(RaceObserver::class);
        Horse::observe(HorseObserver::class);
    }
}

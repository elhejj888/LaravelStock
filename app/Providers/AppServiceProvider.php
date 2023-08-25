<?php

namespace App\Providers;
use App\Observers\MaterialObserver;
use App\Observers\UserObserver;
use App\Observers\Observer;
use App\Models\material;
use App\Models\User;

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
        material::observe(MaterialObserver::class);
        User::observe(UserObserver::class);
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Repository\BookRepository;
use App\Http\DataBasePersist\ProductModelPersist;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(\App\Http\Repository\ProductRepository::class, \App\Http\DataBasePersist\ProductModelPersist::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

<?php

namespace BrandonKerr\Whatdunnit;

use Illuminate\Support\ServiceProvider;

class WhatdunnitServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/whatdunnit.php', 'whatdunnit'
        );
    }

    /**
     * Bootstrap any package services.
     */
    public function boot(): void
    {
        $this->publish();

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }

    protected function publish(): void
    {
        // only publish when necessary
        if (! $this->app->runningInConsole() || ! function_exists('config_path')) {
            return;
        }

        $this->publishes([
            __DIR__.'/../config/whatdunnit.php' => config_path('whatdunnit.php'),
        ]);
    }
}

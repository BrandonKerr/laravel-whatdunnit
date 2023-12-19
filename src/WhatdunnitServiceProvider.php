<?php

namespace BrandonKerr\Whatdunnit;

use Illuminate\Support\ServiceProvider;

class WhatdunnitServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any package services.
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../config/whatdunnit.php' => config_path('whatdunnit.php'),
        ]);

        $this->publishes([
            __DIR__ . '/../database/migrations/whatdunnit.stub' => database_path(
                sprintf('migrations/%s_create_whatdunnit_table.php', date('Y_m_d_His'))
            ),
        ], 'migrations');
    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/whatdunnit.php', 'whatdunnit'
        );
    }
}

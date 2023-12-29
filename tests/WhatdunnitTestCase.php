<?php

namespace BrandonKerr\Whatdunnit\Tests;

use BrandonKerr\Whatdunnit\WhatdunnitServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Orchestra\Testbench\TestCase;

class WhatdunnitTestCase extends TestCase
{
    use RefreshDatabase;

    protected function getPackageProviders($app): array
    {
        return [
            WhatdunnitServiceProvider::class,
        ];
    }

    // protected function defineDatabaseMigrations(): void
    // {
    //     //TODO this will add failed_jobs, password_reset_tokens, and users
    //     $this->loadLaravelMigrations();
    // }
}

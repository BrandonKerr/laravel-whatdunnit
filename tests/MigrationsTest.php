<?php

namespace BrandonKerr\Whatdunnit\Tests;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;

class MigrationsTest extends WhatdunnitTestCase
{

    /**
     * Ensure the table is created
     *
     * @return void
     * @test
     */
    public function tableIsCreated(): void
    {
        $tableName = config('whatdunnit.drivers.database.table');
        $this->assertTrue(Schema::hasTable($tableName));
    }

    /**
     * Ensure the table is created with the custom name set for the config
     *
     * @return void
     * @test
     */
    public function tableIsCreatedWithConfigName(): void
    {
        $customName = 'foo_bar';
        Config::set('whatdunnit.drivers.database.table', $customName);
        Artisan::call('migrate:fresh');
        $this->assertTrue(Schema::hasTable($customName));
    }

    /**
     * Ensure the table has the correct columns
     *
     * @return void
     * @test
     */
    public function tableIsCreatedWithColumns(): void
    {
        $tableName = config('whatdunnit.drivers.database.table');
        $columns = collect(Schema::getColumns($tableName))->keyBy('name');

        $this->assertContains('id', $columns->keys());
        $this->assertEquals('integer', $columns->get('id')['type']);
        $this->assertTrue($columns->get('id')['auto_increment']);
        $this->assertFalse($columns->get('id')['nullable']);

        $this->assertContains('model_type', $columns->keys());
        $this->assertEquals('varchar', $columns->get('model_type')['type']);
        $this->assertFalse($columns->get('model_type')['auto_increment']);
        $this->assertFalse($columns->get('model_type')['nullable']);

        $this->assertContains('model_id', $columns->keys());
        $this->assertEquals('integer', $columns->get('model_id')['type']);
        $this->assertFalse($columns->get('model_id')['auto_increment']);
        $this->assertFalse($columns->get('model_id')['nullable']);

        $this->assertContains('event', $columns->keys());
        $this->assertEquals('varchar', $columns->get('event')['type']);
        $this->assertFalse($columns->get('event')['auto_increment']);
        $this->assertFalse($columns->get('event')['nullable']);

        $this->assertContains('user', $columns->keys());
        $this->assertEquals('varchar', $columns->get('user')['type']);
        $this->assertFalse($columns->get('user')['auto_increment']);
        $this->assertTrue($columns->get('user')['nullable']);

        $this->assertContains('url', $columns->keys());
        $this->assertEquals('text', $columns->get('url')['type']);
        $this->assertFalse($columns->get('url')['auto_increment']);
        $this->assertTrue($columns->get('url')['nullable']);

        $this->assertContains('route_name', $columns->keys());
        $this->assertEquals('varchar', $columns->get('route_name')['type']);
        $this->assertFalse($columns->get('route_name')['auto_increment']);
        $this->assertTrue($columns->get('route_name')['nullable']);

        $this->assertContains('created_at', $columns->keys());
        $this->assertEquals('datetime', $columns->get('created_at')['type']);
        $this->assertFalse($columns->get('created_at')['auto_increment']);
        $this->assertTrue($columns->get('created_at')['nullable']);

        $this->assertContains('updated_at', $columns->keys());
        $this->assertEquals('datetime', $columns->get('updated_at')['type']);
        $this->assertFalse($columns->get('updated_at')['auto_increment']);
        $this->assertTrue($columns->get('updated_at')['nullable']);
    }
}

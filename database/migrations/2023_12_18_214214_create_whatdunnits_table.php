<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $connection = config('whatdunnit.drivers.database.connection', config('database.default'));
        $table = config('whatdunnit.drivers.database.table', 'whatdunnits');

        Schema::connection($connection)->create($table, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->morphs('model');
            $table->string('event');
            $table->string('user')->nullable();
            $table->text('url')->nullable();
            $table->string('route_name')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $connection = config('whatdunnit.drivers.database.connection', config('database.default'));
        $table = config('whatdunnit.drivers.database.table', 'whatdunnits');

        Schema::connection($connection)->drop($table);
    }
};

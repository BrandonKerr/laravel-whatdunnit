<?php

return [

    'enabled' => env('WHATDUNNIT_ENABLED', true),

    /*
    |--------------------------------------------------------------------------
    | Whatdunnit Events
    |--------------------------------------------------------------------------
    |
    | The Eloquent events that trigger a Whatdunnit.
    |
    */

    'events' => [
        'created',
        'updated'
    ],

    /*
    |--------------------------------------------------------------------------
    | Whatdunnit Data
    |--------------------------------------------------------------------------
    |
    | The data settings for recording a Whatdunnit.
    |
    */

    'data' => [
        'user' => true,
        'url' => true,
        'route_name' => true
    ],

    /*
    |--------------------------------------------------------------------------
    | Whatdunnit Data Formatting
    |--------------------------------------------------------------------------
    |
    | The formatting settings for data recording a Whatdunnit.
    |
    */

    'format' => [
        'user' => 'id', // id, email
        'include_base_url' => true, // true, false
    ],

    /*
    |--------------------------------------------------------------------------
    | Whatdunnit Driver Configurations
    |--------------------------------------------------------------------------
    |
    | Available whatdunnit drivers and respective configurations.
    |
    */

    'drivers' => [
        'database' => [
            'table'      => 'whatdunnits',
            'connection' => null,
        ],
    ],
];

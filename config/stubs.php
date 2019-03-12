<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Path to the stub files for the generator
    |--------------------------------------------------------------------------
    */
    'path' => base_path('resources/stubs'),

    /*
    |--------------------------------------------------------------------------
    | Default namespaces for the classes
    |--------------------------------------------------------------------------
    | Warning! Root application namespaсe (like "App") should be skipped.
    */
    'namespaces' => [
        'command'      => '\Console\Commands',
        'controller'   => '\Api\V1\Controllers',
        'event'        => '\Events',
        'exception'    => '\Exceptions',
        'job'          => '\Jobs',
        'listener'     => '\Listeners',
        'mail'         => '\Mail',
        'middleware'   => '\Http\Middleware',
        'model'        => '',
        'notification' => '\Notifications',
        'policy'       => '\Policies',
        'provider'     => '\Providers',
        'request'      => '\Api\V1\Requests',
        'resource'     => '\Http\Resources',
        'rule'         => '\Rules',
    ],

];

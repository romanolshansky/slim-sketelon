<?php

$dotenv = \Dotenv\Dotenv::createUnsafeImmutable(dirname(__DIR__));
$dotenv->load();

return [
    'settings' => [
        'displayErrorDetails' => slim_env('APP_DEBUG') ? true : false,
        'addContentLengthHeader' => false, 
        'determineRouteBeforeAppMiddleware' => true,
        'base_path' => slim_env('APP_URL'),
        'view' => [
            'cache' => slim_env('APP_DEBUG') ? false : (dirname(__DIR__) . '/storage/cache/twig/'),
            'path' => dirname(__DIR__) . '/resources/views/',
        ],
        'db' => [
            'driver' => slim_env('DB_DRIVER'),
            'host' => slim_env('DB_HOST'),
            'port' => slim_env('DB_PORT'),
            'database' => slim_env('DB_DATABASE'),
            'username' => slim_env('DB_USERNAME'),
            'password' => slim_env('DB_PASSWORD'),
            'charset'   => 'utf8',
            'collation' => 'utf8_general_ci',
            'prefix'    => '',
        ],
        'cli' => [
            'commands' => [
                'order/queue'
            ],
        ],
    ],
];
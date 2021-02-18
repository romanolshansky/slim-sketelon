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
        'cli' => [
            'commands' => [
                'order/queue'
            ],
        ],
    ],
];
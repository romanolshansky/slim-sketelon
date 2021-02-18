<?php 

$settings = require_once __DIR__ . '/settings.php';
$app = new \Slim\App($settings);

$dependencies = require __DIR__ . '/dependencies.php';
$dependencies($app);

$middleware = require __DIR__ . '/middleware.php';
$middleware($app);

$routes = require __DIR__ . '/routes.php';
$routes($app);

return $app;

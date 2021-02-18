<?php

use App\Http\Controllers\{
    HomeController,
};

return function (\Slim\App $app) {
	$app->get('/', HomeController::class)->setName('home');
};
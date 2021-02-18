<?php

use App\Http\Middleware\{
	TrailingSlash,
};

return function (\Slim\App $app) {
    $app->add(new TrailingSlash);
};
<?php

define('APP_START_TIME', microtime(true));

require_once __DIR__.'/../vendor/autoload.php';

$app = require_once dirname(__DIR__) . '/bootstrap/app.php';

$app->run();
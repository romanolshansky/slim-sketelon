<?php 

require __DIR__ . '/vendor/autoload.php';

if (PHP_SAPI == 'cli') {
    if($GLOBALS['argv']) {
        $arguments = $GLOBALS['argv'];
    } elseif($_SERVER["argv"]) {
        $arguments = $_SERVER["argv"];
    } elseif($argv){
        $arguments = $argv;
    }

    if(count($arguments) >= 2){
        $path = str_replace(':', '/', $argv[1]);

        $env = \Slim\Http\Environment::mock(['REQUEST_URI' => '/' . $path]);

        $app = require __DIR__ . '/bootstrap/app.php'; 

        $container = $app->getContainer();

        $settings = $container->get('settings');

        if(!empty($settings['cli']['commands']) && is_array($settings['cli']['commands']) && in_array(utf8_strtolower($path), $settings['cli']['commands'])) {
            $container['environment'] = $env;

            $app->run();
        }
    }
}else{
	throw new Exception('This application must be run on the command line.');
}
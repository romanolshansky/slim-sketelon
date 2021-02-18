<?php

return function (\Slim\App $app) {
    $container = $app->getContainer();

    $settings = $container->get('settings');
    $router = $container->get('router');

    $router->setBasePath($settings['base_path']);

    $container['view'] = function (\Slim\Container $container) {
        $settings = $container->get('settings');
        $request = $container->get('request');

        $view = new \Slim\Views\Twig($settings['view']['path'], [
            'cache' => $settings['view']['cache'],
        ]);

        $router = $container->get('router');
        $uri = \Slim\Http\Uri::createFromEnvironment(new \Slim\Http\Environment($request->getServerParams()));
        $view->addExtension(new \Slim\Views\TwigExtension($router, $uri));

        $environment = $view->getEnvironment();
        $environment->addGlobal('app_name', slim_env('APP_NAME'));
        return $view;
        
    };
};
<?php

namespace App\Http;

use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Container;

class Middleware
{
    protected $except = [];

    public $container;

    public function __construct($container = null) {
		if($container instanceof Container){
			$this->container = $container;
		}
	}

	public function __get(string $value) {
		return $this->container->get($value);
	}

	public function __invoke(Request $request, Response $response, callable $next) {
		$route = $request->getAttribute('route');

		if($this->except && $route) {
			if(in_array($route->getPattern(), $this->except) || in_array($route->getName(), $this->except)) {
				return $response;
			}
		}

		if(method_exists($this, 'handle')){
			$response = $this->handle($request, $response, $next);
		}

    	return $response;
	}
}
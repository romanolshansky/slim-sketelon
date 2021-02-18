<?php

namespace App\Http;

use Slim\Container;
use Slim\Http\Request;
use Slim\Http\Response;

class Controller
{
	public function __construct(Container $container) {
		$this->container = $container;
	}

	public function __get(string $value) {
		return $this->container->get($value);
	}

	public function __invoke(Request $request, Response $response, array $args) {
    	if(method_exists($this, 'index')){
       		$this->index($request, $response, $args);
    	}else{
    		throw new \Exception('Not method index');
    	}
	}
}
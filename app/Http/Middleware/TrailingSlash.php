<?php

namespace App\Http\Middleware;

use App\Http\Middleware;
use Slim\Http\Request;
use Slim\Http\Response;

class TrailingSlash extends Middleware
{
	/**
     * Except on routes
     *
     * @var array
     */
    protected $except = [
        '/home/'
    ];

	public function handle(Request $request, Response $response, callable $next) {
		$uri = $request->getUri();

	    $path = $uri->getPath();

	    if ($path != '/' && substr($path, -1) == '/') {
	        while(substr($path, -1) == '/') {
	            $path = substr($path, 0, -1);
	        }

	        $uri = $uri->withPath($path);
	        
	        if($request->getMethod() == 'GET') {
	            return $response->withRedirect((string)$uri, 301);
	        }
	        else {
	            return $next($request->withUri($uri), $response);
	        }
	    }

	    return $next($request, $response);
	}
}
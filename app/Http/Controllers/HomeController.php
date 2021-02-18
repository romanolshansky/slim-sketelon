<?php

namespace App\Http\Controllers;

use App\Http\Controller;
use Slim\Http\Request;
use Slim\Http\Response;

class HomeController extends Controller
{
	public function index(Request $request, Response $response, array $args) {
		return $this->view->render($response, 'index.twig', []); 
	}
}
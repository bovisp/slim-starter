<?php

namespace App\Controllers;

class DashboardController extends Controller
{
	public function index($request, $response)
	{
		var_dump($request->getAttribute('token'));
		die();
		return $this->c->view->render($response, 'dashboard/index.twig');
	}
}
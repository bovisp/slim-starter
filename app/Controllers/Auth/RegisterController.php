<?php

namespace App\Controllers\Auth;

use App\Controllers\Controller;

class RegisterController extends Controller
{
	public function create($request, $response)
	{
		return $this->c->view->render($response, 'auth/register.twig');
	}

	public function store($request, $response)
	{
		dd("store");
	}
}
<?php

namespace App\Controllers\Auth;

use App\Controllers\Controller;
use App\Facades\Response;
use App\Models\User;
use App\Requests\RegisterRequest;

class RegisterController extends Controller
{
	public function create($request, $response)
	{
		return $this->c->view->render($response, 'auth/register.twig');
	}

	public function store($request, $response)
	{	
		dd($this->c->router->getNamedRoute('homee'));	
		$validation = (new RegisterRequest($request, $response, $this->c))->validate();

		if ($validation->failed()) {
			return Response::back();
		}

		$user = User::addUser($request);

		// return redirect($this->c->router->pathFor('home'))$response->withRedirect($this->c->router->pathFor('home'));
		return Response::redirect($this->c->router->pathFor('home'));
	}
}
<?php

namespace App\Controllers\Auth;

use Respect\Validation\Validator as v;
use App\Controllers\Controller;

class RegisterController extends Controller
{
	public function create($request, $response)
	{
		return $this->c->view->render($response, 'auth/register.twig');
	}

	public function store($request, $response)
	{
		v::with('App\\Validation\\Rules');

		$validation = $this->c->validator->validate($request, [
			'firstname' => v::notEmpty(),
			'lastname' => v::notEmpty(),
			'email' => v::uniqueIn('users', 'email'),
			'password' => v::notEmpty() 	
		]);

		if ($validation->failed()) {
			return $response->withRedirect(
				$this->c->router->pathFor('auth.register.create')
			);
		}

		dd("Stored");
	}
}
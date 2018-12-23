<?php

namespace App\Controllers\Auth;

use App\Models\User;
use App\Facades\Auth;
use App\Facades\Request;
use App\Facades\Response;
use App\Controllers\Controller;
use App\Requests\RegisterRequest;

class RegisterController extends Controller
{
	public function create($request, $response)
	{
		return $this->c->view->render($response, 'auth/register.twig');
	}

	public function store($request, $response)
	{	
		$validation = (new RegisterRequest($request, $response, $this->c))->validate();

		if ($validation->failed()) {
			return Response::back();
		}

		$user = User::addUser($request);

		Auth::attempt($user->username, Request::get('password'));

		return Response::redirect('home', [
			'message' => 'You are now signed up!',
			'type' => 'info'
		]);
	}
}
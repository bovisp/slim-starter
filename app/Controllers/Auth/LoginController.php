<?php

namespace App\Controllers\Auth;

use App\Facades\Auth;
use App\Facades\Request;
use App\Facades\Response;
use App\Requests\LoginRequest;
use App\Controllers\Controller;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class LoginController extends Controller
{
	public function create(RequestInterface $request, ResponseInterface $response)
	{
		return Response::view('auth.login');
	}

	public function store(RequestInterface $request, ResponseInterface $response)
	{
		$validation = (new LoginRequest($request, $response, $this->c))->validate();

		if ($validation->failed()) {
			return Response::back();
		}

		$auth = Auth::attempt(Request::get('username'), Request::get('password'));

		if (!$auth) {
			return Response::redirect('auth.login.create', [
				'message' => 'We cannot sign you in with those details',
				'type' => 'error'
			], 401);
		}

		return Response::redirect('home');
	}
}
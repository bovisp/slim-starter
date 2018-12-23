<?php

namespace App\Controllers\Auth;

use App\Facades\Auth;
use App\Facades\Request;
use App\Facades\Response;
use App\Controllers\Controller;
use App\Requests\PasswordResetRequest;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class ResetPasswordController extends Controller
{
	public function show(RequestInterface $request, ResponseInterface $response)
	{
		return Response::view('auth.changepassword');
	}

	public function store(RequestInterface $request, ResponseInterface $response)
	{
		$validation = (new PasswordResetRequest($request, $response, $this->c))->validate();

		if ($validation->failed()) {
			return Response::back();
		}

		Auth::user()->setPassword(Request::get('password'));

		return Response::redirect('home', [
			'message' => 'Password successfully changed.',
			'type' => 'info'
		]);
	}
}
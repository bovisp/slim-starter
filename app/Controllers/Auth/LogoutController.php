<?php

namespace App\Controllers\Auth;

use App\Facades\Auth;
use App\Facades\Response;
use App\Controllers\Controller;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class LogoutController extends Controller
{
	public function store(RequestInterface $request, ResponseInterface $response)
	{
		Auth::logout();

		return Response::redirect('home');
	}
}
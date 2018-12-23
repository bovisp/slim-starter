<?php

namespace App\Middleware;

use App\Facades\Auth;
use App\Facades\Response;

class Authenticated extends Middleware
{
	public function __invoke($request, $response, $next)
	{
		if (!Auth::check()) {
			return Response::redirect('auth.login.create', [
				'message' => 'You need to be logged in to do that',
				'type' => 'error'
			], 403);
		}

		$response = $next($request, $response);

		return $response;
	}
}
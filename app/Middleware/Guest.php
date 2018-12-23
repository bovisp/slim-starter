<?php

namespace App\Middleware;

use App\Facades\Auth;
use App\Facades\Response;

class Guest extends Middleware
{
	public function __invoke($request, $response, $next)
	{
		if (Auth::check()) {
			return Response::redirect('home', [
				'message' => 'You are not authorized to do that',
				'type' => 'error'
			]);
		}

		$response = $next($request, $response);

		return $response;
	}
}
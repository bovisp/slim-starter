<?php

namespace App\Middleware;

use Slim\Interfaces\RouterInterface;

class RedirectIfUnauthenticated
{
	protected $router;

	public function __construct(RouterInterface $router)
	{
		$this->router = $router;
	}

	public function __invoke($request, $response, $next)
	{
		if (true) {
			return $response = $response->withRedirect(
				$this->router->pathFor('auth.login')
			);
		}

		return $next($request, $response);
	}
}
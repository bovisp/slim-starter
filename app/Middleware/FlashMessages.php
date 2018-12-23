<?php

namespace App\Middleware;

class FlashMessages extends Middleware
{
	public function __invoke($request, $response, $next)
	{
		if (isset($_SESSION['flash'])) {
			$this->c->view
				->getEnvironment()
				->addGlobal('flash', $_SESSION['flash']);
		}

		unset($_SESSION['flash']);

		$response = $next($request, $response);

		return $response; 
	}
}
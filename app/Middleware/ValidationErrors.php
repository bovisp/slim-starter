<?php

namespace App\Middleware;

class ValidationErrors extends Middleware
{
	public function __invoke($request, $response, $next)
	{
		if (isset($_SESSION['errors'])) {
			$this->c->view
				->getEnvironment()
				->addGlobal('errors', $_SESSION['errors']);
		}

		unset($_SESSION['errors']);

		$response = $next($request, $response);

		return $response;
	}
}
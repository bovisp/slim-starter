<?php

namespace App\Middleware;

class TrimWhitespace extends Middleware
{
	public function __invoke($request, $response, $next)
	{
		$parsedBody = [];

		if ($request->getParsedBody() !== null) {
			foreach ($request->getParsedBody() as $field => $value) {
				$parsedBody[$field] = $this->trim($value);
			}

			$request = $request->withParsedBody($parsedBody);
		}
		
		return $next($request, $response);
	}

	public function trim($value)
	{
		return trim($value);
	}
}

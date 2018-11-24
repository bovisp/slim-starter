<?php

namespace App\Helpers;

use Interop\Container\ContainerInterface;

class Response
{
	private $c;

	public function __construct(ContainerInterface $c)
	{
		$this->c = $c;
	}

	public function back()
	{
		return $this->c->response->withRedirect(
			$this->c->request->getHeader('HTTP_REFERER')[0]
		);
	}

	public function redirect($route)
	{
		return $this->c->response->withRedirect($route);
	}
}
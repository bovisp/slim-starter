<?php

namespace App\Helpers;

use Interop\Container\ContainerInterface;

class Request
{
	protected $c;

	public function __construct(ContainerInterface $c)
	{
		$this->c = $c;
	}

	public function get($param)
	{
		return $this->c->request->getParam($param);
	}
}
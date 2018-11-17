<?php

namespace App\TwigExtensions;

class GetEnv extends \Twig_Extension
{
	public function getFunctions()
	{
		return [
			new \Twig_SimpleFunction('getenv', array($this, 'getEnv'))
		];
	}

	public function getEnv($variable)
	{
		return getenv($variable);
	}
}
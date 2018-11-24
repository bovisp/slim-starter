<?php

namespace App\Facades;

use App\Facades\Abstracts\Facade;

class Response extends Facade
{
	public static function getFacadeAccessor()
	{
		return 'res';
	}
}
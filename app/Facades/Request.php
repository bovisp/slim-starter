<?php

namespace App\Facades;

use App\Facades\Abstracts\Facade;

class Request extends Facade
{
	public static function getFacadeAccessor()
	{
		return 'req';
	}
}
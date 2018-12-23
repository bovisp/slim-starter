<?php

namespace App\Facades;

use App\Facades\Abstracts\Facade;

class Auth extends Facade
{
	public static function getFacadeAccessor()
	{
		return 'auth';
	}
}
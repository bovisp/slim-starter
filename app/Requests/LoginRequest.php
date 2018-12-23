<?php

namespace App\Requests;

use Respect\Validation\Validator as v;

class LoginRequest extends FormRequest
{
	protected function rules()
	{
		v::with('App\\Validation\\Rules');

		return [
			'username' => v::notEmpty()->existsIn('users', 'username'),
			'password' => v::notEmpty() 
		];
	}
}
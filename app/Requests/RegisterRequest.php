<?php

namespace App\Requests;

use Respect\Validation\Validator as v;

class RegisterRequest extends FormRequest
{
	protected function rules()
	{
		v::with('App\\Validation\\Rules');

		return [
			'username' => v::notEmpty()->uniqueIn('users', 'username'),
			'firstname' => v::notEmpty()->alpha(),
			'lastname' => v::notEmpty()->alpha(),
			'email' => v::notEmpty()->email()->uniqueIn('users', 'email'),
			'password' => v::notEmpty() 	
		];
	}
}
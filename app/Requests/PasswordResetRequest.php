<?php

namespace App\Requests;

use App\Facades\Auth;
use Respect\Validation\Validator as v;

class PasswordResetRequest extends FormRequest
{
	protected function rules()
	{
		v::with('App\\Validation\\Rules');

		return [
			'password_old' => v::notEmpty()->matchesPassword(Auth::user()->password),
			'password' => v::notEmpty() 	
		];
	}
}
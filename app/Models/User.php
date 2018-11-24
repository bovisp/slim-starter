<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
	protected $fillable = [
		'firstname', 'lastname', 'email', 'username', 'password'
	];

	static public function addUser($request)
	{
		return self::create([
			'username' => $request->getParam('username'),
			'firstname' => $request->getParam('firstname'),
			'lastname' => $request->getParam('lastname'),
			'email' => $request->getParam('email'),
			'password' => password_hash($request->getParam('password'), PASSWORD_DEFAULT)
		]);
	}
}
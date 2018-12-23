<?php

namespace App\Auth;

use App\Models\User;
use Interop\Container\ContainerInterface;

class Auth
{
	protected $c;

	public function __construct(ContainerInterface $c)
	{
		$this->c = $c;
	}

	public function check()
	{
		return isset($_SESSION['user']);
	}

	public function guest()
	{
		return !isset($_SESSION['user']);
	}

	public function user()
	{
		if ($this->check()) {
			return User::find($_SESSION['user']);
		}

		return '';
	}

	public function id()
	{
		if ($this->check()) {
			return User::find($_SESSION['user'])->id;
		}

		return '';
	}

	public function attempt($username, $password)
	{
		$user = User::whereUsername($username)->first();

		if (!$user) {
			return false;
		}

		if (password_verify($password, $user->password)) {
			$_SESSION['user'] = $user->id;

			return true;
		}

		return false;
	}

	public function logout()
	{
		unset($_SESSION['user']);
	}
}
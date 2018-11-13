<?php

namespace App\Models;

class User
{
	public function fullName()
	{
		if ($this->lastname === null) {
			return $this->firstname;
		}

		return "{$this->firstname} {$this->lastname}";
	}
}
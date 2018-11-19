<?php

namespace App\Console;

use App\Console\Commands\SayHello;

class Kernel
{
	protected $commands = [
		\App\Console\Commands\SayHello::class
	];

	public function getCommands()
	{
		return $this->commands;
	}
}
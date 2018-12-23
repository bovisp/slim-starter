<?php

namespace App\Console;

use App\Console\Commands\SayHello;

class Kernel
{
	protected $commands = [
		\App\Console\Commands\SayHello::class,
		\App\Console\Commands\Migrate::class,
	];

	protected $defaultCommands = [
		\App\Console\Commands\Generators\ConsoleGenerator::class,
		\App\Console\Commands\Generators\ControllerGenerator::class,
		\App\Console\Commands\Generators\ModelGenerator::class,
		\App\Console\Commands\Generators\MiddlewareGenerator::class,
		\App\Console\Commands\Generators\RequestGenerator::class,
		\App\Console\Commands\Generators\RuleGenerator::class,
	];

	public function getCommands()
	{
		return array_merge(
			$this->commands, $this->defaultCommands
		);
	}
}
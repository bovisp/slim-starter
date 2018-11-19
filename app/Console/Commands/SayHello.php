<?php

namespace App\Console\Commands;

use App\Console\Command;

class SayHello extends Command
{
	protected $command = 'say:hello';

	protected $description = 'Say Hello.';

	public function handle($input, $output)
	{
		$output->writeln('Hello');
	}

	protected function arguments()
	{
		return [];
	}

	protected function options()
	{
		return [];
	}
}
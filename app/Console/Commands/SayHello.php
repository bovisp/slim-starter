<?php

namespace App\Console\Commands;

use App\Console\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class SayHello extends Command
{
	/**
	 * The command name.
	 *
	 * @var string
	 */
	protected $command = 'say:hello';

	/**
	 * The command description.
	 *
	 * @var string
	 */
	protected $description = 'Say Hello.';

	/**
	 * Handle the command
	 * 
	 * @param  InputInterface $input
	 * @param  OutputInterface $input
	 * 
	 * @return void
	 */
	public function handle(InputInterface $input, OutputInterface $output)
	{
		for ($i = 0; $i < $input->getOption('repeat'); $i++) { 
			$this->info('Hello ' . $this->argument('name'));
		}
	}

	/**
	 * Command arguments.
	 * 
	 * @return array
	 */
	protected function arguments()
	{
		return [
			['name', InputArgument::REQUIRED, 'Your name.'],
		];
	}

	/**
	 * Command options.
	 * 
	 * @return array
	 */
	protected function options()
	{
		return [
			['repeat', 'r', InputOption::VALUE_OPTIONAL, 'Times to rpeat the output', 1],
		];
	}
}
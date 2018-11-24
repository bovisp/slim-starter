<?php

namespace App\Console\Commands;

use App\Console\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class Migrate extends Command
{
	/**
	 * The command name.
	 *
	 * @var string
	 */
	protected $command = 'migrate';

	/**
	 * The command description.
	 *
	 * @var string
	 */
	protected $description = 'Migrate table scema\'s to the database';

	/**
	 * Handle the command.
	 * 
	 * @param  InputInterface $input
	 * @param  OutputInterface $input
	 * 
	 * @return void
	 */
	public function handle(InputInterface $input, OutputInterface $output)
	{
		exec('vendor\bin\phinx migrate');

		$this->info('Migrations successfully completed.');
	}

	/**
	 * Command arguments.
	 * 
	 * @return array
	 */
	protected function arguments()
	{
		return [
			//
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
			//
		];
	}
}
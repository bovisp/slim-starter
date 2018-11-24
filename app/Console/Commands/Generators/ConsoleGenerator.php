<?php

namespace App\Console\Commands\Generators;

use App\Console\Command;
use App\Console\Traits\Generatable;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ConsoleGenerator extends Command
{
	use Generatable;

	/**
	 * The command name.
	 *
	 * @var string
	 */
	protected $command = 'make:console';

	/**
	 * The command description.
	 *
	 * @var string
	 */
	protected $description = 'Generate console command.';

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
		$stub = $this->generateStub('command', [
			'DummyClass' => $this->argument('name')
		]);

		$target = __DIR__ . '/../' . $this->argument('name') . '.php';

		if (file_exists($target)) {
			return $this->error('Command already exists');
		}
		
		file_put_contents($target, $stub);

		return $this->info('Console command generated.');
	}

	/**
	 * Command arguments.
	 * 
	 * @return array
	 */
	protected function arguments()
	{
		return [
			['name', InputArgument::REQUIRED, 'The name of the command to generate.'],
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
			//,
		];
	}
}
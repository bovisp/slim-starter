<?php

namespace App\Console\Commands\Generators;

use App\Console\Command;
use App\Console\Traits\Generatable;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ModelGenerator extends Command
{
	use Generatable;

	/**
	 * The command name.
	 *
	 * @var string
	 */
	protected $command = 'make:model';

	/**
	 * The command description.
	 *
	 * @var string
	 */
	protected $description = 'Generate a model.';

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
		$modelBase = __DIR__ . '/../../../Models';

		$path = $modelBase . '/';

		$namespace = 'App\\Models';

		$fileParts = array_filter(explode('\\', $this->argument('name')));

		$fileName = array_pop($fileParts);

		$cleanPath = implode('/', $fileParts);

		if (count($fileParts) >= 1) {
			$path = $path . $cleanPath;

			$namespace = $namespace . '\\' . str_replace('/', '\\', $cleanPath);

			if (!is_dir($path)) {
				mkdir($path, 0777, true);
			}
		}

		$target = $path . '/' . $fileName . '.php';

		if (file_exists($target)) {
			return $this->error('Model already exists');
		}

		$stub = $this->generateStub('model', [
			'DummyClass' => $fileName,
			'DummyNamespace' => $namespace
		]);

		file_put_contents($target, $stub);

		$this->info($fileName . ' model generated');

		if ($this->option('resource')) {
			exec('php masonry make:controller ' . $this->option('resource') . ' --resource="' . $namespace . '\\' . $fileName . '"');
		} elseif ($this->option('controller')) {
			exec('php masonry make:controller ' . $this->option('controller'));
		}

		if ($this->option('migration')) {
			exec('vendor\\bin\\phinx create Create' . $this->option('migration') . 'Table');
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
			['name', InputArgument::REQUIRED, 'The name of the model to generate.'],
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
			['resource', 'r', InputOption::VALUE_REQUIRED, 'Generate a resourceful controller along with this model.', ''],
			['controller', 'c', InputOption::VALUE_REQUIRED, 'Generate a controller along with this model.', ''],
			['migration', 'm', InputOption::VALUE_REQUIRED, 'Generate a migration along with this model.', ''],
		];
	}
}
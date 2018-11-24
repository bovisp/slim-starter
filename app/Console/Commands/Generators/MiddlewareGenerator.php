<?php

namespace App\Console\Commands\Generators;

use App\Console\Command;
use App\Console\Traits\Generatable;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class MiddlewareGenerator extends Command
{
	use Generatable;

	/**
	 * The command name.
	 *
	 * @var string
	 */
	protected $command = 'make:middleware';

	/**
	 * The command description.
	 *
	 * @var string
	 */
	protected $description = 'Generate a middleware file.';

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
		$middlewareBase = __DIR__ . '/../../../Middleware';

		$path = $middlewareBase . '/';

		$namespace = 'App\\Middleware';

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
			return $this->error('Middleware already exists');
		}

		$stub = $this->generateStub('middleware', [
			'DummyClass' => $fileName,
			'DummyNamespace' => $namespace
		]);

		file_put_contents($target, $stub);

		$this->info($fileName . ' middleware generated');
	}

	/**
	 * Command arguments.
	 * 
	 * @return array
	 */
	protected function arguments()
	{
		return [
			['name', InputArgument::REQUIRED, 'The name of the controller to generate.'],
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
<?php

namespace App\Console\Commands\Generators;

use App\Console\Command;
use App\Console\Traits\Generatable;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class RuleGenerator extends Command
{
	use Generatable;

	/**
	 * The command name.
	 *
	 * @var string
	 */
	protected $command = 'make:rule';

	/**
	 * The command description.
	 *
	 * @var string
	 */
	protected $description = 'Generate a custom Respect Validation rule and accompanying exception.';

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
		$ruleBase = __DIR__ . '/../../../Validation/Rules';
		$exceptionBase = __DIR__ . '/../../../Validation/Exceptions';

		$rulePath = $ruleBase;
		$exceptionPath = $exceptionBase;

		$ruleNamespace = 'App\\Validation\\Rules';
		$exceptionNamespace = 'App\\Validation\\Exceptions';

		$fileName = $this->argument('name');

		$ruleTarget = $rulePath . '/' . $fileName . '.php';
		$exceptionTarget = $exceptionPath . '/' . $fileName . 'Exception.php';

		if (file_exists($ruleTarget)) {
			return $this->error('Rule already exists');
		}

		if (file_exists($exceptionTarget)) {
			return $this->error('Rule exception already exists');
		}

		$ruleStub = $this->generateStub('rule', [
			'DummyClass' => $fileName,
			'DummyNamespace' => $ruleNamespace
		]);

		$exceptionStub = $this->generateStub('ruleException', [
			'DummyClass' => $fileName . 'Exception',
			'DummyNamespace' => $exceptionNamespace
		]);

		file_put_contents($ruleTarget, $ruleStub);

		file_put_contents($exceptionTarget, $exceptionStub);

		$this->info($fileName . ' rule generated');
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
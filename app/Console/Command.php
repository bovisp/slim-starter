<?php

namespace App\Console;

use Interop\Container\ContainerInterface;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Command\Command as Cmnd;

abstract class Command extends Cmnd
{
	protected $ci;

	private $input;

	private $output;

	public function __construct(ContainerInterface $ci)
	{
		parent::__construct();

		$this->ci = $ci;
	}

	protected function configure()
	{
		$this->setName($this->command)
			->setDescription($this->description);	
	}

	protected function execute(InputInterface $input, OutputInterface $output)
	{
		$this->input = $input;

		$this->output = $output;
		return $this->handle($input, $output);
	}
}
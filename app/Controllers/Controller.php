<?php

namespace App\Controllers;

use Interop\Container\ContainerInterface;

abstract class Controller
{
	protected $c;

	public function __construct(ContainerInterface $c)
	{
		$this->c = $c;
	}

	protected function abort($response, $status = 404, $message = '', $wantsJson = false)
	{
		if ($message === '') {
			$message = $this->defaultMessage($status);
		}

		if ($wantsJson) {
			return $response->withJson([
				'error' => $message
			], $status);
		}

		return $this->c->view->render(
			$response->withStatus($status),
			"errors/{$status}.twig",
			[
				'message'=> $message
			]
		);
	}

	protected function defaultMessage($status)
	{
		switch ($status) {
			case 404:
				return 'Sorry, page not found';
		}
	}
}
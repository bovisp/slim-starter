<?php

namespace App\Requests;

use Interop\Container\ContainerInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Respect\Validation\Validator as v;

abstract class FormRequest
{
	protected $c;
	protected $request;
	protected $response;

	public function __construct(RequestInterface $request, ResponseInterface $response, ContainerInterface $c)
	{
		$this->c = $c;
		$this->request = $request;
		$this->response = $response;
	}

	public function validate()
	{
		return $this->c->validator->validate($this->request, $this->response, $this->rules());	
	}
}
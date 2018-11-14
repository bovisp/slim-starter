<?php

namespace App\Handlers;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Handlers\AbstractHandler;
use Slim\Views\Twig;

class NotFound extends AbstractHandler
{
	protected $view;

	public function __construct(Twig $view)
	{
		$this->view = $view;
	}

	public function  __invoke(ServerRequestInterface $request, ResponseInterface $response)
	{
		$contentType = $this->determineContentType($request);

        switch ($contentType) {
            case 'application/json':
                $output = $this->responseWithJson($response);
                break;

            case 'text/html':
                $output = $this->responseWithHtml($response);
                break;
        }

        return $output->withStatus(404);
	}

	protected function responseWithJson($response)
	{
		return $response->withJson([
			'error' => 'Not found.'
		]);
	}

	protected function responseWithHtml($response)
	{
		return $this->view->render($response, 'errors/404.twig');
	}
} 
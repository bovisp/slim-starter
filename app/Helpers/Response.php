<?php

namespace App\Helpers;

use Interop\Container\ContainerInterface;

class Response
{
	protected $c;

	public function __construct(ContainerInterface $c)
	{
		$this->c = $c;
	}

	public function back()
	{
		return $this->c->response->withRedirect(
			$this->c->request->getHeader('HTTP_REFERER')[0]
		);
	}

	public function redirect($route, $flash = [], $status = 200)
	{
		if (!empty($flash)) {
			$_SESSION['flash'] = $flash;
		}

		foreach($this->c->router->getRoutes() as $r) {
			if ($r->getName() === $route) {
				return $this->c->response->withRedirect(
					$this->c->router->pathFor($route)
				);
			}
		}

		return $this->c->response->withRedirect($route);
	}

	public function view($view, $data = [])
	{
		$view = str_replace('.', '/', $view) . '.twig';

		return $this->c->view->render($this->c->response, $view, $data);
	}
}
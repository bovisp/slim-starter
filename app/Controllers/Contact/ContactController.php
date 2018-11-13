<?php

namespace App\Controllers\Contact;

use App\Controllers\Controller;

class ContactController extends Controller
{
	public function index($request, $response)
	{
		return $this->c->view->render($response, 'contact/index.twig');
	}

	public function store($request, $response)
	{
		return $response->withRedirect(
			$this->c->router->pathFor('contact.confirm')
		);
	}
}
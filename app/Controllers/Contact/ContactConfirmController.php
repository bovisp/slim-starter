<?php

namespace App\Controllers\Contact;

use App\Controllers\Controller;

class ContactConfirmController extends Controller
{
	public function index($request, $response)
	{
		return $this->c->view->render($response, 'contact/confirm.twig');
	}
}
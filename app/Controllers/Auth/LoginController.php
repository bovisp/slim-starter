<?php 

namespace App\Controllers\Auth;

use App\Controllers\Controller;

class LoginController extends Controller
{
	public function index($request, $response)
	{
		return $this->c->view->render($response, 'auth/login.twig');
	}
}
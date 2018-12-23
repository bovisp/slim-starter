<?php

namespace App\Controllers;

use App\Facades\Response;

class HomeController extends Controller
{
	public function index($request, $response)
	{
		return Response::view('home');
	}
}
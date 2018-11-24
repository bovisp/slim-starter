<?php

namespace App\Controllers\Users;

use App\Models\Users;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class UsersController extends Controller
{
	public function index(RequestInterface $request, ResponseInterface $response)
	{
		//
	}

	public function create(RequestInterface $request, ResponseInterface $response)
	{
		//
	}

	public function store(RequestInterface $request, ResponseInterface $response)
	{
		dd("storing");
	}

	public function edit(RequestInterface $request, ResponseInterface $response)
	{
		//
	}

	public function update(RequestInterface $request, ResponseInterface $response)
	{
		//
	}

	public function destroy(RequestInterface $request, ResponseInterface $response)
	{
		//
	}
}
<?php

namespace App\Controllers;

use PDO;
use App\Models\User;

class UsersController extends Controller
{
	public function index($request, $response)
	{
		$stmt = $this->c->database
			->query("SELECT * FROM users");

		$users = $stmt->fetchAll(PDO::FETCH_CLASS, User::class);

		return $this->c->view->render($response, 'users/index.twig', compact('users'));
	}

	public function show($request, $response, $args)
	{
		$stmt = $this->c->database
			->prepare("SELECT * FROM users WHERE id = :id");

		$stmt->execute([
			'id' => $args['id']
		]);

		$stmt->setFetchMode(PDO::FETCH_CLASS, User::class);

		$user = $stmt->fetch();

		if (!$user) {
			$this->abort($response, 404, 'Sorry! User not found');
		}

		return $this->c->view->render($response, 'users/show.twig', compact('user'));
	}
}
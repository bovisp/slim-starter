<?php

namespace App\Controllers\Api;

use PDO;
use App\Models\User;
use App\Controllers\Controller;

class UsersController extends Controller
{
	public function index($request, $response)
	{
		$stmt = $this->c->database
			->query("SELECT * FROM users");

		$users = $stmt->fetchAll(PDO::FETCH_CLASS, User::class);

		return $response->withJson($users, 200);
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
			return $this->abort($response, 404, '', true);
		}

		return $response->withJson($user, 200);
	}
}
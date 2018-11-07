<?php

$app->get('/', function ($request, $response) {
	return $this->view->render($response, 'home.twig');
})->setName('home');

$app->get('/users', function ($request, $response) {
	$users = [
		[
			'username' => 'bovisp',
			'firstname' => 'Paul',
			'lastname' => 'Bovis'
		],
		[
			'username' => 'bovisv',
			'firstname' => 'Vida',
			'lastname' => 'Bovis'
		],
		[
			'username' => 'bovise',
			'firstname' => 'Eleanor',
			'lastname' => 'Bovis'
		],
	];

	return $this->view->render($response, 'users/index.twig', [
		'users' => $users
	]);
})->setName('users.index');

$app->get('/contact', function ($request, $response) {
	return $this->view->render($response, 'contact.twig');
})->setName('contact');
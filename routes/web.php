<?php

use App\Controllers\HomeController;
use App\Controllers\Auth\RegisterController;

$app->get('/', HomeController::class . ':index')
	->setName('home');

$app->group('/auth', function () {
	$this->get('/register', RegisterController::class . ':create')
		->setName('auth.register.create');

	$this->post('/register', RegisterController::class . ':store')
		->setName('auth.register.store');
});
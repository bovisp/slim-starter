<?php

use App\Middleware\Guest;
use App\Middleware\Authenticated;
use App\Controllers\HomeController;
use App\Controllers\Auth\LoginController;
use App\Controllers\Auth\LogoutController;
use App\Controllers\Auth\RegisterController;
use App\Controllers\Auth\ResetPasswordController;

$app->get('/', HomeController::class . ':index')
	->setName('home');

// Guest routes
$app->group('/auth', function () {
	$this->get('/register', RegisterController::class . ':create')
		->setName('auth.register.create');

	$this->post('/register', RegisterController::class . ':store')
		->setName('auth.register.store');

	$this->get('/login', LoginController::class . ':create')
		->setName('auth.login.create');

	$this->post('/login', LoginController::class . ':store')
		->setName('auth.login.store');
})->add(new Guest($container));

// Auth routes 
$app->group('/auth', function () {
	$this->get('/logout', LogoutController::class . ':store')
		->setName('auth.logout.store');

	$this->get('/resetpassword', ResetPasswordController::class . ':show')
		->setName('auth.reset.show');

	$this->post('/resetpassword', ResetPasswordController::class . ':store')
		->setName('auth.reset.store');
})->add(new Authenticated($container));
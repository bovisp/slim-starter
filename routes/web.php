<?php

use App\Controllers\HomeController;
use App\Controllers\UsersController;
use App\Controllers\DashboardController;
use App\Controllers\Auth\LoginController;
use App\Middleware\RedirectIfUnauthenticated;
use App\Controllers\Contact\ContactController;
use App\Controllers\Contact\ContactConfirmController;

$app->get('/', HomeController::class . ':index')
	->setName('home');

$app->group('', function () {
	$this->get('/dashboard', DashboardController::class . ':index')
		->setName('dashboard.index');
})->add(new RedirectIfUnauthenticated($container['router']));

$app->group('/auth', function () {
	$this->get('/login', LoginController::class . ':index')
		->setName('auth.login');
});

$app->group('/users', function () {
	$this->get('', UsersController::class . ':index')
		->setName('users.index');

	$this->get('/{id}', UsersController::class . ':show')
		->setName('users.show');
});

$app->group('/contact', function () {
	$this->get('', ContactController::class . ':index')
		->setName('contact.index');

	$this->post('', ContactController::class . ':store')
		->setName('contact.store');

	$this->get('/confirm', ContactConfirmController::class . ':index')
		->setName('contact.confirm');
});


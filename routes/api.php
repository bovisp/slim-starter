<?php

use App\Controllers\Api\UsersController;

$app->group('/api', function () {
	$this->group('/users', function () {
		$this->get('', UsersController::class . ':index')
			->setName('users.index.api');

		$this->get('/{id}', UsersController::class . ':show')
			->setName('users.show');
	});
});
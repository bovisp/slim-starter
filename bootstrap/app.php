<?php

require __DIR__ . '/../vendor/autoload.php';

$app = new \Slim\App([
	'settings' => [
		'displayErrorDetails' => true
	]
]);

$container = $app->getContainer();

require_once 'views.php';
require_once 'database.php';
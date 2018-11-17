<?php

session_start();

require __DIR__ . '/../vendor/autoload.php';

// Initialize dotenv.
$dotenv = new Dotenv\Dotenv(__DIR__ . '/../');
$dotenv->load();

$app = new \Slim\App([
	'settings' => [
		'displayErrorDetails' => getenv('APP_DEBUG'),

		'app' => [
			'name' => getenv('APP_NAME')
		],

		'views' => [
			'cache' => __DIR__ . '/../storage/views'
		],

		'database' => [
			'driver' => getenv('DB_DRIVER'),
			'host' => getenv('DB_HOST'),
			'post' => getenv('DB_PORT'),
			'database' => getenv('DB_DATABASE'),
			'username' => getenv('DB_USERNAME'),
			'password' => getenv('DB_PASSWORD')
		]
	],
]);

$container = $app->getContainer();

require_once 'csrf.php';
require_once 'views.php';
require_once 'database.php';
require_once 'notFoundHandler.php';
require_once 'validator.php';

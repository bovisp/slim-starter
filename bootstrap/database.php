<?php

$config = $container['settings']['database'];

use Illuminate\Database\Capsule\Manager as DB;

$capsule = new DB;

$capsule->addConnection(array_merge($config, [
	'charset' => 'utf8',
	'collation' => 'utf8_unicode_ci'
]));

// Set the event dispatcher used by Eloquent models... (optional)
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
$capsule->setEventDispatcher(new Dispatcher(new Container));

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();

$container['db'] = function($container) use ($capsule) {
	return $capsule;
};

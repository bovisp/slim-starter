<?php

App\Facades\Response::setContainer($container);
App\Facades\Auth::setContainer($container);
App\Facades\Request::setContainer($container);

$container['res'] = function ($container) {
	return new \App\Helpers\Response($container);
};

$container['req'] = function ($container) {
	return new \App\Helpers\Request($container);
};

$container['auth'] = function ($container) {
	return new \App\Auth\Auth($container);
};
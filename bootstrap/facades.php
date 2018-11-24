<?php

App\Facades\Str::setContainer($container);
App\Facades\Response::setContainer($container);

$container['str'] = function ($container) {
	return new \App\Helpers\Str();
};

$container['res'] = function ($container) {
	return new \App\Helpers\Response($container);
};
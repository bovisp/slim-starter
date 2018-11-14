<?php

$container['notFoundHandler'] = function ($c) {
	return new \App\Handlers\NotFound($c['view']);
};
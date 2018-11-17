<?php

$container['csrf'] = function ($container) {
    return new \Slim\Csrf\Guard;
};
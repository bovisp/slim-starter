<?php

// CSRF protection
$app->add($container->get('csrf'));

// Check for validation errors
$app->add(new \App\Middleware\ValidationErrors($container));

// Check for validation errors
$app->add(new \App\Middleware\OldInput($container));

// Trim sthrings in request body.
$app->add(new \App\Middleware\TrimWhitespace($container));

// Trim sthrings in request body.
$app->add(new \App\Middleware\FlashMessages($container));
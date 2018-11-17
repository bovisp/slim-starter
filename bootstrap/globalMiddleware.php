<?php

// CSRF protection
$app->add($container->get('csrf'));

// Check for validation errors
$app->add(new \App\Middleware\ValidationErrors($container['view']));

// Check for validation errors
$app->add(new \App\Middleware\OldInput($container['view']));

// Trim sthrings in request body.
$app->add(new \App\Middleware\TrimWhitespace);
<?php

// Register component on container
$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig('../resources/views', [
        // 'cache' => $container->settings['views']['cache']
        'cache' => false
    ]);

    // Instantiate and add Slim specific extension
    $router = $container->get('router');
    $uri = \Slim\Http\Uri::createFromEnvironment(new \Slim\Http\Environment($_SERVER));

    $view->addExtension(new Slim\Views\TwigExtension($router, $uri));
    $view->addExtension(new App\TwigExtensions\CsrfField($container['csrf']));
    $view->addExtension(new App\TwigExtensions\MethodField);
    $view->addExtension(new App\TwigExtensions\GetEnv);

    return $view;
};
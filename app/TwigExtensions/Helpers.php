<?php

namespace App\TwigExtensions;

use Slim\Views\TwigExtension;

class Helpers extends TwigExtension
{
    private $router;

    private $uri;

    public function __construct($router, $uri)
    {
        $this->router = $router;
        $this->uri = $uri;
    }

    public function getName()
    {
        return 'isLoggedIn';
    }

    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('getenv', array($this, 'getEnv'))
        ];
    }

    public function getEnv ($variable)
    {
        return getenv($variable);
    }
}
<?php

class Router
{
    protected $routes = [
        'GET'       => [],
        'POST'      => []
    ];

    public static function load($file)
    {
        $router = new static;

        require $file;

        return $router;
    }

    public function get($uri, $controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }

    public function post($uri, $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }

    // I guess I just post this since the DELETE verb
    // isn't understood by PHP and I don't want to do this
    // with a get.
    public function delete($uri, $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }

    public function direct($uri, $request_type)
    {
        // about/culture
        if (array_key_exists($uri, $this->routes[$request_type])) {
            return $this->routes[$request_type][$uri];
        }

        throw new Exception('No route defined for this URI.');
    }
}

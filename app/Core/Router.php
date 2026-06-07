<?php

class Router
{
    private $routes = [];

    public function get($uri, $action)
    {
        $this->routes['GET'][$uri] = $action;
    }

    public function post($uri, $action)
    {
        $this->routes['POST'][$uri] = $action;
    }

    public function dispatch()
    {
        $method = $_SERVER['REQUEST_METHOD'];

        $uri = parse_url(
            $_SERVER['REQUEST_URI'],
            PHP_URL_PATH
        );

        $uri = str_replace(
            '/mvc-blog-system/public',
            '',
            $uri
        );

        $uri = str_replace(
            '/index.php',
            '',
            $uri
        );

        if ($uri === '') {
            $uri = '/';
        }

        if (isset($this->routes[$method][$uri])) {

            [$controller, $action] = explode(
                '@',
                $this->routes[$method][$uri]
            );

            require_once
                __DIR__ .
                '/../Controllers/' .
                $controller .
                '.php';

            $controller = new $controller();

            $controller->$action();

        } else {

            http_response_code(404);

            echo '404 Not Found';
        }
    }
}
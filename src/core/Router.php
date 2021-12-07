<?php

namespace src\core;

use src\core\Response;

class Router
{
    public array $routes = [
        'GET' => [],
        'POST' => [],
        'PUT' => [],
        'PATCH' => [],
        'DELETE' => []
    ];

    public static function load($file)
    {
        $router = new static();

        require $file;

        return $router;
    }

    /**
     * @param string $uri
     * @param array $action
     * @return void
     */
    public function get(string $uri, string $action): void
    {
        $this->routes['GET'][$uri] = $action;
    }

    public function post(string $uri, string $action): void
    {
        $this->routes['POST'][$uri] = $action;
    }

    public function put(string $uri, string $action): void
    {
        $this->routes['PUT'][$uri] = $action;
    }

    public function patch(string $uri, string $action): void
    {
        $this->routes['PATCH'][$uri] = $action;
    }

    
    public function delete(string $uri, string $action): void
    {
        $this->routes['DELETE'][$uri] = $action;
    }

    public function direct($uri, $requestType)
    {
        if (array_key_exists($uri, $this->routes[$requestType])) {
            return $this->callAction(
                ...explode('@', $this->routes[$requestType][$uri])
            );
        }

        return Response::routeNotFound($uri);
    }

    public function callAction($controller, $action)
    {
        $gateway = getGatewayNameByController($controller);

        $params = Request::params();
        $dataFromBody = Request::extractDataFromBody();

        $pathGateway = getPathGateway($gateway);
        $pathGateway = new $pathGateway();

        $controller = getPathController($controller);
        $controller = new $controller($pathGateway);

        if ($dataFromBody) {
            return $controller->$action($dataFromBody);
        }
        
        if (empty($params)) {
            return $controller->$action();
        }

        return $controller->$action($params);
    }
}
<?php

namespace App\Framework;

class Router
{

    private array $routes = [];

    public function add(string $path, array $params = [], string $namespace = null)
    {
        $this->routes[] = [
            'path' => $path,
            'params' => ['controller' => $params["controller"], 'action' => $params["action"]],
            'namespace' => $namespace
        ];
    }

}

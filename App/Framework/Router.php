<?php

namespace App\Framework;

class Router
{

    private array $routes = [];

    public function add(string $path, array $params = [], string $namespace = null): void
    {
        $this->routes[] = [
            'path' => $path,
            'params' => ['controller' => $params["controller"], 'action' => $params["action"]],
            'namespace' => $namespace
        ];
    }

    // /user/15/profile from request
    // GET /user/{id}/profile → UserController@show -> saved routes
    // now what url turn to regex then compare/match to saved url

    public function matchUrl($current_url)
    {
        var_dump($current_url);
    }

    public function routeList(): void
    {
        print_r($this->routes);
    }



}

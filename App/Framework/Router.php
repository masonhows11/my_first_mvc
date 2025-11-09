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

    // /article/show/{id}  from request
    // GET /user/{id}/profile → UserController@show -> saved routes
    // now what url turn to regex then compare/match to saved url

    public function matchUrl($current_url)
    {
        $params = [];
        foreach ($this->routes as $route) {


        }
    }

    public function routeList(): void
    {
        print_r($this->routes);
    }


}

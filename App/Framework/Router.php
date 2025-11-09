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

    public function matchUrl($current_url): false|array
    {
        $params = [];
        foreach ($this->routes as $route) {

            $pattern = $this->getPatternFromUrl($current_url);

            if (preg_match($pattern, $route['path'], $matches)) {

                $matches = array_filter($matches, "is_string", ARRAY_FILTER_USE_KEY);

                $params = array_merge($matches, $route['params']);
            }
            return $params;
        }
        return false;

    }

    private function getPatternFromUrl($current_url): string
    {

    }

    public function routeList(): void
    {
        print_r($this->routes);
    }




}

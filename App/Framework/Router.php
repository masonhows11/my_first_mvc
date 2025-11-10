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
    // generally we make a dynamic pattern based on current url
    // but make dynamic pattern on each route saved in routes array
    // then compare with currentUrl

    public function matchUrl($current_url): false|array
    {
        $params = [];
        // to clean the url
        $current_url = urldecode($current_url);
        $current_url = trim($current_url,"/");
        foreach ($this->routes as $route) {

            // $pattern = $this->getPatternFromUrl($current_url);
            $pattern = $this->getPatternFromUrl($route['path']);

            if (preg_match($pattern, $current_url, $matches)) {

                $matches = array_filter($matches, "is_string", ARRAY_FILTER_USE_KEY);

                $params = array_merge($matches, $route['params']);
            }
            return $params;
        }
        return false;

    }

    private function getPatternFromUrl($current_url)
    {

        //return 'hello';
    }

    public function routeList(): void
    {
        print_r($this->routes);
    }


}

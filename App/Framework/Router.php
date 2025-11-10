<?php

namespace App\Framework;

class Router
{

    private array $routes = [];



    public function add(string $path, array $params = [], array $namespace = []): void
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

    public function matchUrl($current_url)
    {
        $params = [];

        // to clean the url
        // $current_url = urldecode($current_url);
        // $current_url = trim($current_url, "/");
        //        foreach ($this->routes as $route) {
        //
        //            // $pattern = $this->getPatternFromUrl($current_url);
        //            $pattern = $this->getPatternFromUrl($route['path']);
        //
        //            if (preg_match($pattern, $current_url, $matches)) {
        //
        //                $matches = array_filter($matches, "is_string", ARRAY_FILTER_USE_KEY);
        //
        //                $params = array_merge($matches, $route['params']);
        //            }
        //            return $params;
        //        }
        // $pattern = $this->getPatternFromUrl($current_url);
        // $path = "/article/show/{id}";
        // $path = "/articles";
        // $path = "/home/index";
        // $path = "/products/{id}";
        // $path = "/article/{slug}";
        // $path = "/articles/index";
        // $path = "/article/show/{id}/{slug}";

        $current_url = urldecode($current_url);
        $current_url = trim($current_url, "/");

        foreach ($this->routes as $route) {

            $pattern = $this->getPatternFromUrl($route['path']);

            if (preg_match($pattern, $current_url, $matches)) {
                $matches = array_filter($matches, "is_string", ARRAY_FILTER_USE_KEY);
                $params = array_merge($matches, $route['params']);
                return $params;
            }
            return false;
        }
    }

    private function getPatternFromUrl($path)
    {
       
        $pattern = [];
        $path = trim($path, "/");
        $path = explode("/", $path);

        foreach ($path as $item) {

            if (preg_match("/{([a-zA-Z0-9_]*)\}$/", $item, $matches)) {

                $pattern[] .= '(?<' . $matches[1] . '>[^\.]+)';
            } elseif (preg_match("/^([a-zA-Z0-9_]*)$/", $item, $matches)) {

                $pattern[] .= '([a-zA-Z0-9_]+)';
            }
        }
        return '/^' . implode("\/", $pattern) . '$/';
    }

    public function routeList(): void
    {
        print_r($this->routes);
    }
}

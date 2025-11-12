<?php

namespace App\Framework;

use ReflectionMethod;

class Dispatcher
{

    private Router $router;

    public function __construct(Router $router)
    {
        $this->router = $router;
    }


    /**
     * @throws \ReflectionException
     */
    public function dispatch($segments): void
    {

        $controller = $segments['controller'];
        $action = $segments['action'];
        $namespace = $segments['namespace'];


        $controllerName = $this->getController($controller, $namespace);
        $action = $this->getAction($action);
        $args = $this->getArguments($controllerName,$action);
        var_dump($args);

        $controller_obj = new $controllerName();
        $controller_obj->$action();


    }

    private function getController($controller, $namespace = null): string
    {
        $default_namespace = "App\\Controllers\\";
        // if namespace not null then add namespace to default
        // If a class is located in a different namespace from the main directory,
        // execute that controller from there.
        if (!empty($namespace)) {
            return $default_namespace .=  $namespace . "\\" . ucfirst($controller);
        }
        return $controller_name = "App\\Controllers\\" . ucfirst($controller);
    }


    private function getAction($action)
    {
        return $action;
    }

    /**
     * @throws \ReflectionException
     */
    private function getArguments($controller, $action)
    {
            $reflection = new ReflectionMethod($controller, $action);
            return $reflection->class;
    }


}
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


    public function dispatch($segments)
    {

        $controller = $segments['controller'];
        $action = $segments['action'];
        $namespace = $segments['namespace'];


        $controllerName = $this->getController($controller, $namespace);
        $action = $this->getAction($action);

        $controller_obj = new $controllerName();
        $controller_obj->$action();


    }

    private function getController($controller, $namespace)
    {
        $default_namespace = "App\\Controllers\\";
        // if namespace not null then add namespace to default
        // If a class is located in a different namespace from the main directory,
        // execute that controller from there.
        if (!empty($namespace)) {
            return $default_namespace .=  $namespace . "\\" . ucfirst($controller);
        }
        return $controllerName = "App\\Controllers\\" . ucfirst($controller);
    }


    private function getAction($action)
    {
        return $action;
    }

    private function getArguments()
    {

    }


}
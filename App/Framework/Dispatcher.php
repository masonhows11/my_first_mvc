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

        $controller_obj = null;


        $controllerName = $this->getController($controller);
        $action = $this->getAction($action);


        $controller_obj = new $controllerName();
        $controller_obj->$action();


    }

    private function getController($controller)
    {
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
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

        $controllerName = "App\\Controllers\\".ucfirst($controller);
        // $controller = ucfirst($controller) . '.php';
        // var_dump($controllerName, $controller);
        //        if (file_exists("App/Controllers/" . $controller)) {
        //            require "App/Controllers/$controller";
        //        } else {
        //            var_dump("$controller file not found");
        //        }


        $controller_obj = new $controllerName();
        $controller_obj->$action();

        //$controllerName = ucfirst($controller) . 'Controller';
        //$controller = ucfirst($controller) . 'Controller.php';
    }



}
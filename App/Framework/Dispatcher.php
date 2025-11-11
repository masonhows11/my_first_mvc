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
        //        var_dump($segments);
        //        exit();
        $controller = $segments[1];
        $action = $segments[2];
        $controller_obj = null;

        $controllerName = ucfirst($controller) . 'Controller';
        $controller = ucfirst($controller) . 'Controller.php';

        if (file_exists("src/controllers/" . $controller)) {
            require "src/controllers/$controller";
        } else {
            var_dump('nok');
        }


        $controller_obj = new $controllerName;
        $controller_obj->$action();
    }

}
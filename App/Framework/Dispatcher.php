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
        $params = $segments['params'];


        $controllerName = $this->getController($controller, $namespace);
        $action = $this->getAction($action);
        $args = $this->getArguments($controllerName, $action, $params);
        var_dump($args);

        $controller_obj = new $controllerName();
        $controller_obj->$action(...$args);



    }

    private function getController($controller, $namespace = null): string
    {
        $default_namespace = "App\\Controllers\\";
        // if namespace not null then add namespace to default
        // If a class is located in a different namespace from the main directory,
        // execute that controller from there.
        if (!empty($namespace)) {
            return $default_namespace .= $namespace . "\\" . ucfirst($controller);
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
    private function getArguments($controller, $action, $parameters)
    {
        $arguments = [];
        $reflection = new ReflectionMethod($controller, $action);
        // get the args pass to the method in class
        $params = $reflection->getParameters();
        foreach ($params as $param) {

            $name = $param->getName();
            // If the parameters coming from the route match the parameters of the method,
            // put them into a specific array.
            if (isset($parameters[$name])) {
                $arguments[] = $parameters[$name];
            } elseif ($param->isDefaultValueAvailable()) {
                $arguments[] = $param->getDefaultValue();
            } else {
                $arguments[] = [];
            }

        }
        return $arguments;

    }


}
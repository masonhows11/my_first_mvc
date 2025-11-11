<?php

$current_url = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

spl_autoload_register(function (string $class_name) {
    $file = __DIR__ . "/" . str_replace("\\", "/", $class_name . ".php");
    var_dump($file);
    if (file_exists($file)) {
        // example C:\laragon\www\simple_mvc + App\Framework\Router.php
        // then require it
        require_once $file;
    } else {
        exit("Class $class_name file not found");
    }
});
// autoload based on namespace & folder structure
// require the files
// make obj from class
$router = new App\Framework\Router();

// this route is base root / home root
$router->add('/',
    ["controller" => "HomeController", "action" => "index"]);

$router->add('/home/index',
    ["controller" => "HomeController", "action" => "index"]);

$router->add("/articles/index",
    ["controller" => "ArticleController", "action" => "index"]);
//
$router->add('/article/show/{id}',
    ["controller" => "ArticleController", "action" => "show"]);

$router->add('/article/single/{slug}',
    ["controller" => "ArticleController", "action" => "single"]);

$router->add('/article/me/{id}/{slug}',
    ["controller" => "ArticleController", "action" => "me"]);


$segments = $router->matchUrl($current_url);
if ($segments === false) {
    echo("404 Requested Route Not Found ");
} else {
    $dispatcher = new App\Framework\Dispatcher($router);
    $dispatcher->dispatch($segments);
}



// $router->add('/{title}/{id:\d+}/{page:\d+}',["controller" => "ArticleController", "action" => "showPage"]);
// $router->add('admin/{controller}/{action}', ["namespace" => "Admin"]);
// $router->add('/{controller}/{action}');


//// solution 3
//$controller = $segments[1];
//$action = $segments[2];
//$controller_obj = null;
//
//$controllerName = ucfirst($controller) . 'Controller';
//$controller = ucfirst($controller) . 'Controller.php';
//
//if (file_exists("src/controllers/" . $controller)) {
//    require "src/controllers/$controller";
//} else {
//    var_dump('nok');
//}
//
//
//
//$controller_obj = new $controllerName;
//$controller_obj->$action();


//// solution 2
//$action = $_GET['action'] ?? '';
//$controller = $_GET['controller'] ?? '';
//$controller_obj = null;
//
//$controllerName = ucfirst($controller) . 'Controller';
//$controller = ucfirst($controller) . 'Controller.php';
//
//if (file_exists("src/controllers/" . $controller)) {
//    require "src/controllers/$controller";
//} else {
//    var_dump('nok');
//}
//
//
//
//$controller_obj = new $controllerName;
//$controller_obj->$action();


//// solution 1
//if ($controller == "article") {
//
//    $controller_obj = new ArticleController;
//
//} elseif ($controller == "home") {
//
//    $controller_obj = new HomeController;
//}
//if ($action == "index") {
//    $controller_obj->index();
//
//} elseif ($action == "show") {
//    $controller_obj->show();
//}





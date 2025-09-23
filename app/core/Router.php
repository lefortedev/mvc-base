<?php
require_once('../app/controllers/HomeController.php');
require_once('../app/controllers/erros/HttpErrorController.php');

class Router {
    public function dispatch($url){

        $url = trim($url, "/");
        $parts = $url ? explode("/", $url) : [];

        $controllerName = $parts[0] ?? "Home";
        $actionName = $parts[1] ?? "index";

        $controllerName = ucfirst($controllerName) . "Controller";

        if(!class_exists($controllerName))
        {
            $controller = new HttpErrorController();
            $controller->notFound();
            return;
        }
        
        $controller = new $controllerName();

        if(!method_exists($controller, $actionName))
        {
            $controller = new HttpErrorController();
            $controller->notFound();
            return;
        }

        $params = array_slice($parts, 2);

        call_user_func_array([$controller, $actionName], $params);

    }
}
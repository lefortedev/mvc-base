<?php

namespace App\Core;

Use App\Controllers\Errors\HttpErrorController;

require_once 'functions.php';

class Router {
    public function dispatch($url){

        $url = trim($url, "/");
        $parts = $url ? explode("/", $url) : [];

        $controllerName = $parts[0] ?? "Home";
        $actionName = $parts[1] ?? "index";
        // dd($actionName, $controllerName);

        $controllerName = 'App\Controllers\\' . ucfirst($controllerName) . "Controller";

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
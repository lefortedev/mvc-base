<?php

require_once __DIR__ . "/../vendor/autoload.php";

Use App\Core\Router;

$url = $_GET['url'] ?? '';

$router = new Router();
$router->dispatch($url);
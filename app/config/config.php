<?php

return [
    'db' => [
        'host' => 'localhost',
        'dbname' => 'mvc_base',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8mb4'
    ],
    'app' => [
        'base_url' => 'http://localhost/curso-php/mvc-base/public',
        'views_path' => __DIR__ . '/../views/',
        'default_controller' => 'HomeController',
        'default_action' => 'index'
    ]
];
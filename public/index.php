<?php

use app\core\Application;

require_once __DIR__ . "/../vendor/autoload.php";
$app = new Application(__DIR__);
$router = $app->router;
//Routes
$router->post('/api', 'Api');
$router->post('/api/file', 'Api@file');
$router->get('/api/{name}', 'Api@router');

$router->run();

<?php

use app\core\Application;

require_once __DIR__ . "/../vendor/autoload.php";
$app = new Application(__DIR__);
$router = $app->router;
//Routes
$router->get('/api', 'Api@info');
$router->post('/api', 'Api');
$router->get('/api/{name}', 'Api');

$router->run();

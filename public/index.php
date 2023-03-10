<?php

require __DIR__ . '/../vendor/autoload.php';

error_reporting(0);

use Rest\Server\Http\Router;

$router = new Router();

$router->action($_SERVER['REQUEST_URI']);

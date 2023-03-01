<?php

require __DIR__ . '/../vendor/autoload.php';

error_reporting(0);

use Rest\Server\Http\Router;

$router = new Router();

$url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

$router->action($url);

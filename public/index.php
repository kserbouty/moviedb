<?php

require __DIR__ . '/../vendor/autoload.php';

// error_reporting(0);

use Rest\Server\Http\Router;

$router = new Router();

// $router->action( $_SERVER['REQUEST_URI']);

$config = new \Rest\Server\Database\Config();

echo '<pre>';

var_dump($config);

echo '</pre>';

$connection = new \Rest\Server\Database\Connection();

echo '<pre>';

var_dump($connection->getDSN($config));

echo '</pre>';



<?php

require __DIR__ . '/../vendor/autoload.php';

error_reporting(0);

use Rest\Server\Controller\MovieController;
use Rest\Server\Http\Response;

$uri = $_SERVER['REQUEST_URI'];

$controller = new MovieController();

if (($_SERVER['REQUEST_METHOD'] === 'GET') && str_contains($uri,'/moviedb/movie/')) {
    $split = explode('/moviedb/movie/', $uri);
    $movie_id = $split[1];

    if (is_numeric($movie_id)) {
        echo $controller->getMovie($movie_id);
    }

    if (!is_numeric($movie_id)) {
        $response = new Response();
        $data = (object)[
            'status_message' => '403 Forbidden',
            'status_code' => 403
        ];

        echo $response->jsonResponse($data, 403);
    }
}

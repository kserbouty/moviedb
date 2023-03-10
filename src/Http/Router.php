<?php

declare(strict_types=1);

namespace Rest\Server\Http;

use Rest\Server\Controller\MovieController;

class Router
{
    public function action(string $uri): void
    {
        $response = new Response();

        if (str_contains($uri, '/movie/')) {

            self::actionMovie($uri, $response);

        }

        $data = (object)[
            'status_message' => '501 Not Implemented',
            'status_code' => 501
        ];

        echo $response->jsonResponse($data, 501);
        exit(501);
    }

    private function actionMovie(string $uri, Response $response): void
    {
        $split = explode('/movie/', $uri);
        $movie_id = $split[1];

        if (is_numeric($movie_id)) {
            $controller = new MovieController();
            $movie = $controller->getMovie((int)$movie_id);

            if (is_bool($movie)) {
                $data = (object)[
                    'status_message' => '404 Not Found',
                    'status_code' => 404
                ];
                echo $response->jsonResponse($data, 404);
                exit(404);
            }

            echo $response->jsonResponse($movie, 200);
            exit(200);

        } else {
            $data = (object)[
                'status_message' => '403 Forbidden',
                'status_code' => 403
            ];
            echo $response->jsonResponse($data, 403);
            exit(403);
        }
    }
}

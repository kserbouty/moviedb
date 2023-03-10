<?php

declare(strict_types=1);

namespace Rest\Server\Http;

use Rest\Server\Controller\MovieController;

class Router
{
    public function action(string $uri): string
    {
        $response = new Response();

        if (str_contains($uri, '/movie/')) {

            $action = self::actionMovie($uri);

            if (!array_key_exists('request', $action)) {
                $data = (object)[
                    'status_message' => $action['status_message'],
                    'status_code' => $action['status_code']
                ];
                return $response->jsonResponse($data, $action['status_code']);
            }

            $data = (object)[
                'status_message' => $action['status_message'],
                'status_code' => $action['status_code'],
                'request' => $action['request']
            ];

            return $response->jsonResponse($data, $action['status_code']);
        }

        $data = (object)[
            'status_message' => '501 Not Implemented',
            'status_code' => 501
        ];

        return $response->jsonResponse($data, 501);
    }

    private function actionMovie(string $uri): array
    {
        $split = explode('/movie/', $uri);
        $movie_id = $split[1];

        if (is_numeric($movie_id)) {

            $controller = new MovieController();
            $movie = $controller->getMovie((int)$movie_id);

            if (is_bool($movie)) {
                return [
                    'status_message' => '404 Not Found',
                    'status_code' => 404
                ];
            }

            return [
                'status_message' => '200 OK',
                'status_code' => 200,
                'request' => $movie
            ];

        } else {

            return [
                'status_message' => '403 Forbidden',
                'status_code' => 403
            ];
        }

    }
}

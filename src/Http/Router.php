<?php

declare(strict_types=1);

namespace Rest\Server\Http;

use Rest\Server\Controller\MovieController;

class Router
{
    public function action(string $uri): void
    {

        if (str_contains($uri, '/movie/')) {

            $array = explode('/movie/', $uri);
            $index = $array[1];

            if (is_numeric($index)) {
                $controller = new MovieController();
                $id = (int)$index;
                echo $controller->getMovie($id);
            }

            if (!is_numeric($index)) {
                $response = new Response();
                $data = (object)[
                    'status_message' => '403 Forbidden',
                    'status_code' => 403
                ];

                echo $response->jsonResponse($data, 403);
            }

        } else {
            $response = new Response();
            $data = (object)[
                'status_message' => 'No content to send for this request.',
                'status_code' => 204
            ];

            echo $response->jsonResponse($data, 204);
        }
    }
}
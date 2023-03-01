<?php

namespace Rest\Server\Http;

use Rest\Server\Controller\MovieController;

class Router
{
    public function action(string $url): void
    {
        $parse = parse_url($url);

        if (str_contains($parse['path'], '/moviedb/movie/')) {

            $split = explode('/moviedb/movie/', $parse['path']);
            $id = $split[1];

            if (is_numeric($id)) {
                $controller = new MovieController();
                echo $controller->getMovie($id);
            }

            if (!is_numeric($id)) {
                $response = new Response();
                $data = (object)[
                    'status_message' => '403 Forbidden',
                    'status_code' => 403
                ];

                echo $response->jsonResponse($data, 403);
            }
        }
    }
}
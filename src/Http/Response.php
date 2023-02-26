<?php

declare(strict_types=1);

namespace Rest\Server\Http;

error_reporting(0);

class Response
{
    public function send(object $data, int $status): void
    {
        header_remove();
        header('Access-Control-Allow-Origin: *');
        header('Cache-Control: max-age=36000');
        header('Content-Type: application/json');

        http_response_code($status);

        try {

            $response = json_encode($data, JSON_THROW_ON_ERROR | JSON_PRETTY_PRINT);

        } catch (\JsonException $exception) {
            echo "Error #" . $exception->getCode() . " : " . $exception->getMessage();
            exit();
        }

        echo $response;
    }
}
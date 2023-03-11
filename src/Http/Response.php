<?php

declare(strict_types=1);

namespace Rest\Server\Http;

class Response
{
    public function jsonResponse(object $data, int $status): string
    {
        header_remove();
        header('Access-Control-Allow-Origin: *');
        header('Cache-Control: max-age=36000');
        header('Content-Type: application/json; charset=utf8');

        http_response_code($status);

        try {

            $response = json_encode($data, JSON_THROW_ON_ERROR | JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

        } catch (\JsonException $exception) {
            $response =  "Error #" . $exception->getCode() . " : " . $exception->getMessage() . ".";
        }

        return $response;
    }
}
<?php

namespace Rest\Tests\Http;

use Rest\Server\Http\Router;
use PHPUnit\Framework\TestCase;

class RouterTest extends TestCase
{
    public function testAccessMovieReturnExpectedResponse(): void
    {
        $router = new Router;

        $correct_uri = '/movie/1';

        $expectedJson = $router->action($correct_uri);

        $this->assertJson($expectedJson);
    }

    public function testAccessMovieWithWrongCharactersReturnExpectedResponse(): void
    {
        $router = new Router;
        $uri = '/movie/1; DROP TABLE movie;';

        $actual = $router->action($uri);

        $expected = json_encode((object)[
            'status_message' => '403 Forbidden',
            'status_code' => 403
        ]);

        $this->assertJsonStringEqualsJsonString($expected, $actual);
    }

    public function testAccessUnknownMovieReturnExpectedResponse(): void
    {
        $router = new Router;
        $uri = '/movie/99';

        $actual = $router->action($uri);

        $expected = json_encode((object)[
            'status_message' => '404 Not Found',
            'status_code' => 404
        ]);

        $this->assertJsonStringEqualsJsonString($expected, $actual);
    }

    public function testAccessUnknownRouteReturnExpectedResponse(): void
    {
        $router = new Router;
        $uri = '/unknown/route';

        $actual = $router->action($uri);

        $expected = json_encode((object)[
            'status_message' => '501 Not Implemented',
            'status_code' => 501
        ]);

        $this->assertJsonStringEqualsJsonString($expected, $actual);
    }
}

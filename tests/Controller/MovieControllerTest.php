<?php

namespace Rest\Tests\Controller;

use Rest\Server\Controller\MovieController;
use PHPUnit\Framework\TestCase;

class MovieControllerTest extends TestCase
{
    public function testFetchMovie_withCorrectId_shouldSendJsonResponse(): void
    {
        $controller = new MovieController();
        $json_response = $controller->getMovie(1);

        $this->assertJson($json_response);
    }

    public function testFetchMovie_withWrongId_shouldSendJsonResponse(): void
    {
        $controller = new MovieController();
        $json_response = $controller->getMovie(99);

        $this->assertJson($json_response);
    }
}

<?php

namespace Rest\Tests\Http;

use PHPUnit\Framework\TestCase;
use Rest\Server\Http\Response;

class ResponseTest extends TestCase
{
    public function testJsonResponse_withObjectAndStatus_shouldReturnJsonObject(): void
    {
        $response = new Response();
        $object = (object)[];

        $this->assertJson($response->jsonResponse($object, 200));
    }
}

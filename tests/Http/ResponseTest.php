<?php

namespace Rest\Tests\Http;

use PHPUnit\Framework\TestCase;
use Rest\Server\Http\Response;

class ResponseTest extends TestCase
{

    public function testWrongJsonDataReturnExpectedResponse(): void
    {
        $response = new Response();

        $data = (object)[
            'Invalid Expression' => INF
        ];

        $actual = $response->jsonResponse($data, 200);

        $expected = 'Error #7 : Inf and NaN cannot be JSON encoded.';

        $this->assertSame($expected, $actual);
    }
}

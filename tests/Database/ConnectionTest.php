<?php

namespace Rest\Tests\Database;

use Rest\Server\Database\Connection;
use PHPUnit\Framework\TestCase;

class ConnectionTest extends TestCase
{
    public function test_ExecuteQuery_withCorrectDSN_shouldReturnPDOStatement(): void
    {
        $connection = new Connection();
        $pdo = $connection->getPDO();

        $this->assertInstanceOf(\PDOStatement::class, $pdo->query("SELECT * FROM rest_server.movie"));
    }
}

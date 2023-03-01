<?php

namespace Rest\Tests\Database;

use Rest\Server\Database\Connection;
use PHPUnit\Framework\TestCase;

class ConnectionTest extends TestCase
{
    public function testExecuteQuery_withCorrectDSN_shouldReturnPDOStatement(): void
    {
        $connection = new Connection();
        $pdo = $connection->getPDO();

        $this->assertInstanceOf(\PDOStatement::class, $pdo->query("SELECT * FROM movie_db.movie"));
    }
}

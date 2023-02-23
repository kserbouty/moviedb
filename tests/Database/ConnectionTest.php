<?php

namespace Rest\Tests\Database;

use Rest\Server\Database\Connection;
use PHPUnit\Framework\TestCase;

class ConnectionTest extends TestCase
{

    public function testCreateDatabaseConnection(): void
    {
        $connection = new Connection();
        $pdo = $connection->getPDO();

        $this->assertInstanceOf(\PDO::class, $pdo);
    }
}

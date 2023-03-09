<?php

namespace Rest\Tests\Database;

use Rest\Server\Database\Config;
use Rest\Server\Database\Connection;
use PHPUnit\Framework\TestCase;

class ConnectionTest extends TestCase
{
    public function testGetDSNReturnExpectedString(): void
    {
        $config = new Config();
        $config->setDriver('mysql');
        $config->setName('test_db');
        $config->setHost('localhost');
        $config->setPort('3306');
        $config->setCharset('utf8');

        $connection = new Connection;

        $actual = $connection->getDSN($config);
        $expected = 'mysql:dbname=test_db;host=localhost;port=3306;charset=utf8';

        $this->assertSame($expected, $actual);
    }

    public function testUsernameAvailableInConnection()
    {
        $config = new Config;
        $config->setUsername('test_user');

        $connection = new Connection();

        $actual = $connection->getUsername($config);
        $expected = 'test_user';

        $this->assertSame($expected, $actual);
    }

    public function testPasswordAvailableInConnection()
    {
        $config = new Config;
        $config->setPassword('test_password');

        $connection = new Connection();

        $actual = $connection->getPassword($config);
        $expected = 'test_password';

        $this->assertSame($expected, $actual);
    }

    public function testIncorrectDSNTriggerException()
    {
        $this->expectException(\PDOException::class);

        $connection = new Connection();
        $connection->setDSN('wrong_dsn');

        $connection->getPDO();
    }

    public function testIncorrectUsernameTriggerException()
    {
        $this->expectException(\PDOException::class);

        $connection = new Connection();
        $connection->setUsername('wrong_username');

        $connection->getPDO();
    }

    public function testIncorrectPasswordTriggerException()
    {
        $this->expectException(\PDOException::class);

        $connection = new Connection();
        $connection->setPassword('wrong_password');

        $connection->getPDO();
    }
}

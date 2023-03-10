<?php

namespace Rest\Tests\Database;

use PHPUnit\Framework\TestCase;
use Rest\Server\Database\Config;

class ConfigTest extends TestCase
{
    public function testGetCredentialsReturnExpectedStructure(): void
    {
        $config = new Config();

        $ini_file = parse_ini_file($config::CONFIG_PATH, true);

        $this->assertArrayHasKey('db_driver', $ini_file);
        $this->assertArrayHasKey('db_name', $ini_file);
        $this->assertArrayHasKey('db_host', $ini_file);
        $this->assertArrayHasKey('db_port', $ini_file);
        $this->assertArrayHasKey('db_charset', $ini_file);
        $this->assertArrayHasKey('db_username', $ini_file);
        $this->assertArrayHasKey('db_password', $ini_file);
    }
}

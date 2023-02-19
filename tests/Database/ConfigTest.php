<?php

declare(strict_types=1);

namespace Rest\Tests\Database;

use PHPUnit\Framework\TestCase;
use Rest\Server\Database\Config;

class ConfigTest extends TestCase
{

    public function test_valid_database_configuration(): void
    {
        $config = new Config();

        $this->assertIsString($config->getDriver());
        $this->assertIsString($config->getName());
        $this->assertIsString($config->getHost());
        $this->assertIsString($config->getPort());
        $this->assertIsString($config->getCharset());
        $this->assertIsString($config->getUsername());
        $this->assertIsString($config->getPassword());
    }
}

<?php

namespace Rest\Tests\Database;

use PHPUnit\Framework\TestCase;
use Rest\Server\Database\Config;

class ConfigTest extends TestCase
{
    public function test_AccessIniFile_withCorrectPath_shouldBeReadable(): void
    {
        $path = __DIR__ . '/../../config';
        $file = __DIR__ . '/../../config/config.ini';

        $this->assertDirectoryExists($path);
        $this->assertDirectoryIsReadable($path);

        $this->assertFileExists($file);
        $this->assertFileIsReadable($file);
    }

    public function test_ParseIniFile_withCorrectCredentials_shouldReturnStringForEachElement(): void
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

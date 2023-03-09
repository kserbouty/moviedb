<?php

declare(strict_types=1);

namespace Rest\Server\Database;

class Config
{
    const CONFIG_PATH = __DIR__ . '/../../config/config.ini';
    private string $db_driver;
    private string $db_name;
    private string $db_host;
    private string $db_port;
    private string $db_charset;
    private string $db_username;
    private string $db_password;

    public function __construct()
    {
        self::initialize();
    }

    private function initialize(): void
    {
        $ini_file = parse_ini_file(self::CONFIG_PATH, true);

        $this->db_driver = $ini_file['db_driver'];
        $this->db_name = $ini_file['db_name'];
        $this->db_host = $ini_file['db_host'];
        $this->db_port = $ini_file['db_port'];
        $this->db_charset = $ini_file['db_charset'];
        $this->db_username = $ini_file['db_username'];
        $this->db_password = $ini_file['db_password'];
    }

    public function getDriver(): string
    {
        return $this->db_driver;
    }

    public function getName(): string
    {
        return $this->db_name;
    }

    public function getHost(): string
    {
        return $this->db_host;
    }

    public function getPort(): string
    {
        return $this->db_port;
    }

    public function getCharset(): string
    {
        return $this->db_charset;
    }

    public function getUsername(): string
    {
        return $this->db_username;
    }

    public function getPassword(): string
    {
        return $this->db_password;
    }

    public function setDriver(string $db_driver): void
    {
        $this->db_driver = $db_driver;
    }

    public function setName(string $db_name): void
    {
        $this->db_name = $db_name;
    }

    public function setHost(string $db_host): void
    {
        $this->db_host = $db_host;
    }

    public function setPort(string $db_port): void
    {
        $this->db_port = $db_port;
    }

    public function setCharset(string $db_charset): void
    {
        $this->db_charset = $db_charset;
    }

    public function setUsername(string $db_username): void
    {
        $this->db_username = $db_username;
    }

    public function setPassword(string $db_password): void
    {
        $this->db_password = $db_password;
    }
}

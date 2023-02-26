<?php

declare(strict_types=1);

namespace Rest\Server\Database;

class Config
{
    private string $driver;
    private string $dbname;
    private string $host;
    private string $port;
    private string $charset;
    private string $username;
    private string $password;

    public function __construct()
    {
        $this->setup();
    }

    public function getDriver(): string
    {
        return $this->driver;
    }

    public function getName(): string
    {
        return $this->dbname;
    }

    public function getHost(): string
    {
        return $this->host;
    }

    public function getPort(): string
    {
        return $this->port;
    }

    public function getCharset(): string
    {
        return $this->charset;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    private function setup(): void
    {
        $path = __DIR__ . "/../../config/config.ini";

        try {
            $config = parse_ini_file($path, true);

            $this->driver = $config['database']['driver'];
            $this->dbname = $config['database']['dbname'];
            $this->host = $config['database']['host'];
            $this->port = $config['database']['port'];
            $this->charset = $config['database']['charset'];
            $this->username = $config['database']['username'];
            $this->password = $config['database']['password'];

        } catch (\Throwable $exception) {
            echo " Error #" . $exception->getCode() . " : " . $exception->getMessage()
                . " in " . $exception->getFile() . " on line " . $exception->getLine();
            exit();
        }
    }
}

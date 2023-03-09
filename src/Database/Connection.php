<?php

declare(strict_types=1);

namespace Rest\Server\Database;

class Connection
{
    private string $dsn;
    private string $pdo_username;
    private string $pdo_password;

    public function getPDO(): \PDO
    {
        return new \PDO($this->dsn, $this->pdo_username, $this->pdo_password);
    }

    public function __construct()
    {
        self::initialize();
    }

    private function initialize(): void
    {
        $config = new Config();
        $this->dsn = self::getDSN($config);
        $this->pdo_username = self::getUsername($config);
        $this->pdo_password = self::getPassword($config);
    }

    public function getDSN(Config $config): string
    {
        return $config->getDriver()
            . ":dbname="
            . $config->getName()
            . ";host="
            . $config->getHost()
            . ";port="
            . $config->getPort()
            . ";charset="
            . $config->getCharset();
    }

    public function getUsername(Config $config): string
    {
        return $config->getUsername();
    }

    public function getPassword(Config $config): string
    {
        return $config->getPassword();
    }

    public function setDSN(string $dsn): void
    {
        $this->dsn = $dsn;
    }

    public function setUsername(string $username): void
    {
        $this->pdo_username = $username;
    }

    public function setPassword(string $password): void
    {
        $this->pdo_password = $password;
    }
}

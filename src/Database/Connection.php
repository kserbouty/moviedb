<?php

declare(strict_types=1);

namespace Rest\Server\Database;

class Connection
{
    private readonly Config $config;

    public function __construct()
    {
        $this->config = new Config();
    }

    public function getPDO(): bool|\PDO
    {
        try {
            $pdo = new \PDO($this->getDSN(), $this->config->getUsername(), $this->config->getPassword());
        } catch (\Throwable $exception) {
            echo "Code[" . $exception->getCode() . "]: " . $exception->getMessage();
            echo " in " . $exception->getFile() . " on line " . $exception->getLine() . ".";
            $pdo = false;
        }

        return $pdo;
    }

    private function getDSN(): string
    {
        return $this->config->getDriver()
            . ":dbname="
            . $this->config->getName()
            . ";host="
            . $this->config->getHost()
            . ";port="
            . $this->config->getPort()
            . ";charset="
            . $this->config->getCharset();
    }
}

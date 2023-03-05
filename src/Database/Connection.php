<?php

declare(strict_types=1);

namespace Rest\Server\Database;

readonly class Connection
{
    private Config $config;

    public function __construct()
    {
        $this->config = new Config();
    }

    public function getPDO(): \PDO
    {
        try {
            $pdo = new \PDO($this->getDSN(), $this->config->getUsername(), $this->config->getPassword());
        } catch (\Throwable $exception) {
            echo " Error #" . $exception->getCode() . " : " . $exception->getMessage()
                . " in " . $exception->getFile() . " on line " . $exception->getLine();
            exit();
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

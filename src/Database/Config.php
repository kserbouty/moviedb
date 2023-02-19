<?php

declare(strict_types=1);

namespace Rest\Server\Database;

class Config
{

    private string $db_driver;
    private string $db_host;
    private string $db_name;
    private string $db_password;
    private string $db_username;

    public function __construct()
    {
        $this->initialize();
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

    public function getUsername(): string
    {
        return $this->db_username;
    }

    public function getPassword(): string
    {
        return $this->db_password;
    }

    private function initialize(): void
    {
        $ini_path = __DIR__ . "/../../config/config.ini";
        $db_config = parse_ini_file($ini_path, true);

        $this->db_driver = $db_config['database']['driver'];
        $this->db_name = $db_config['database']['name'];
        $this->db_host = $db_config['database']['host'];
        $this->db_username = $db_config['database']['username'];
        $this->db_password = $db_config['database']['password'];
    }
}

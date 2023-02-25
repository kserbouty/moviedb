<?php

declare(strict_types=1);

namespace Rest\Server\Repository;

use Rest\Server\Database\Connection;
use Rest\Server\Entity\Country;

class CompanyRepository
{
    private Connection $connection;

    public function __construct()
    {
        $this->connection = new Connection();
    }

    public function getCompanyCountries(int $company_id): bool|array
    {
        try {
            $pdo = $this->connection->getPDO();
            $query = "SELECT iso_3166_1, country_name FROM rest_server.country INNER JOIN rest_server.company_country ON country.id = company_country.country_id WHERE company_id = ?;";

            $statement = $pdo->prepare($query);
            $statement->bindValue(1, $company_id, \PDO::PARAM_INT);
            $statement->execute();
            $statement->setFetchMode(\PDO::FETCH_CLASS, Country::class);

            $countries = $statement->fetchAll();

        } catch (\Throwable $exception) {
            echo "Code[" . $exception->getCode() . "]: " . $exception->getMessage();
            echo " in " . $exception->getFile() . " on line " . $exception->getLine() . ".";

            $countries = false;
        }

        return $countries;
    }
}

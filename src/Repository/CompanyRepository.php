<?php

declare(strict_types=1);

namespace Rest\Server\Repository;

use Rest\Server\Database\Connection;

class CompanyRepository
{
    private Connection $connection;

    public function __construct()
    {
        $this->connection = new Connection();
    }

    public function getCompanyCountries(int $company_id): array
    {
        try {
            $pdo = $this->connection->getPDO();
            $query = "SELECT iso_3166_1, country_name FROM rest_server.country INNER JOIN rest_server.company_country ON country.id = company_country.country_id WHERE company_id = ?;";

            $statement = $pdo->prepare($query);
            $statement->bindValue(1, $company_id, \PDO::PARAM_INT);
            $statement->execute();
            $statement->setFetchMode(\PDO::FETCH_OBJ);

            $countries = $statement->fetchAll();

        } catch (\Throwable $exception) {
            echo " Error #" . $exception->getCode() . " : " . $exception->getMessage()
                . " in " . $exception->getFile() . " on line " . $exception->getLine();
            exit();
        }

        return $countries;
    }
}

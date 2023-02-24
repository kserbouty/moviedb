<?php

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

    public function getCompanyCountries(int $id): bool|array
    {
        try {
            $pdo = $this->connection->getPDO();
            $query = "SELECT iso_3166_1, name FROM rest_server.country WHERE country.id = ?;";

            $statement = $pdo->prepare($query);
            $statement->bindValue(1, $id, \PDO::PARAM_INT);
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

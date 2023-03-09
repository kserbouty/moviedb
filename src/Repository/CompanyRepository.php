<?php

declare(strict_types=1);

namespace Rest\Server\Repository;

use Rest\Server\Database\Connection;
use Rest\Server\Model\Country;

class CompanyRepository
{
    public function getCompanyCountries(int $company_id): array
    {
        $connection = new Connection();

        $pdo = $connection->getPDO();
        $query = "SELECT country_iso, country_name FROM movie_db.country INNER JOIN movie_db.companies_countries ON country.country_id = companies_countries.countries_id WHERE companies_id = ?;";

        $statement = $pdo->prepare($query);
        $statement->bindValue(1, $company_id, \PDO::PARAM_INT);
        $statement->execute();
        $statement->setFetchMode(\PDO::FETCH_CLASS, Country::class);

        return $statement->fetchAll();
    }
}

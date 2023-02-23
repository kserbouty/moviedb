<?php

declare(strict_types=1);

namespace Rest\Server\Repository;

use Rest\Server\Database\Connection;
use Rest\Server\Entity\Country;
use Rest\Server\Entity\Genre;
use Rest\Server\Entity\Language;
use Rest\Server\Entity\Movie;
use Rest\Server\Entity\Company;

class MovieRepository
{
    private Connection $connection;
    public function __construct()
    {
        $this->connection = new Connection();
    }

    public function getMovieDetails(int $id): bool|Movie
    {
        try {
            $pdo = $this->connection->getPDO();
            $query = "SELECT * FROM rest_server.movie WHERE id = ?;";

            $statement = $pdo->prepare($query);
            $statement->bindValue(1, $id, \PDO::PARAM_INT);
            $statement->execute();
            $statement->setFetchMode(\PDO::FETCH_CLASS, Movie::class);

            $movie = $statement->fetch();

        } catch (\Throwable $exception) {
            echo "Code[" . $exception->getCode() . "]: " . $exception->getMessage();
            echo " in " . $exception->getFile() . " on line " . $exception->getLine() . ".";

            $movie = false;
        }

        return $movie;
    }

    public function getMovieCompanies(int $id): bool|array
    {
        try {
            $pdo = $this->connection->getPDO();
            $query = "SELECT id, logo_path, name FROM rest_server.company INNER JOIN rest_server.movie_company ON company.id = movie_company.company_id WHERE movie_id = ?;";

            $statement = $pdo->prepare($query);
            $statement->bindValue(1, $id, \PDO::PARAM_INT);
            $statement->execute();
            $statement->setFetchMode(\PDO::FETCH_CLASS, Company::class);

            $companies = $statement->fetchAll();

        } catch (\Throwable $exception) {
            echo "Code[" . $exception->getCode() . "]: " . $exception->getMessage();
            echo " in " . $exception->getFile() . " on line " . $exception->getLine() . ".";

            $companies = false;
        }

        return $companies;
    }

    public function getMovieCountries(int $id): bool|array
    {
        try {
            $pdo = $this->connection->getPDO();
            $query = "SELECT id, iso_3166_1, name FROM rest_server.country INNER JOIN rest_server.movie_country ON country.id = movie_country.country_id WHERE movie_id = ?;";

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

    public function getMovieLanguages(int $id): bool|array
    {
        try {
            $pdo = $this->connection->getPDO();
            $query = "SELECT id, iso_639_1, name FROM rest_server.language INNER JOIN rest_server.movie_language ON language.id = movie_language.language_id WHERE movie_id = ?;";

            $statement = $pdo->prepare($query);
            $statement->bindValue(1, $id, \PDO::PARAM_INT);
            $statement->execute();
            $statement->setFetchMode(\PDO::FETCH_CLASS, Language::class);

            $languages = $statement->fetchAll();

        } catch (\Throwable $exception) {
            echo "Code[" . $exception->getCode() . "]: " . $exception->getMessage();
            echo " in " . $exception->getFile() . " on line " . $exception->getLine() . ".";

            $languages = false;
        }

        return $languages;
    }

    public function getMovieGenres(int $id): bool|array
    {
        try {
            $pdo = $this->connection->getPDO();
            $query = "SELECT id, name FROM rest_server.genre INNER JOIN rest_server.movie_genre ON genre.id = movie_genre.genre_id WHERE movie_id = ?;";

            $statement = $pdo->prepare($query);
            $statement->bindValue(1, $id, \PDO::PARAM_INT);
            $statement->execute();
            $statement->setFetchMode(\PDO::FETCH_CLASS, Genre::class);

            $genres = $statement->fetchAll();

        } catch (\Throwable $exception) {
            echo "Code[" . $exception->getCode() . "]: " . $exception->getMessage();
            echo " in " . $exception->getFile() . " on line " . $exception->getLine() . ".";

            $genres = false;
        }

        return $genres;
    }
}

<?php

declare(strict_types=1);

namespace Rest\Server\Repository;

use Rest\Server\Database\Connection;

require_once __DIR__ . '/../../vendor/autoload.php';

class MovieRepository
{
    private Connection $connection;
    public function __construct()
    {
        $this->connection = new Connection();
    }

    public function getMovieDetails(int $movie_id): bool|object
    {
        try {
            $pdo = $this->connection->getPDO();
            $query = "SELECT * FROM rest_server.movie WHERE id = ?;";

            $statement = $pdo->prepare($query);
            $statement->bindValue(1, $movie_id, \PDO::PARAM_INT);
            $statement->execute();
            $statement->setFetchMode(\PDO::FETCH_OBJ);

            $movie = $statement->fetch();

        } catch (\Throwable $exception) {
            echo " Error #" . $exception->getCode() . " : " . $exception->getMessage()
                . " in " . $exception->getFile() . " on line " . $exception->getLine();
            exit();
        }

        return $movie;
    }

    public function getMovieCompanies(int $movie_id): array
    {
        try {
            $pdo = $this->connection->getPDO();
            $query = "SELECT id, company_name, logo_path, origin_country FROM rest_server.company INNER JOIN rest_server.movie_company ON company.id = movie_company.company_id WHERE movie_id = ?;";

            $statement = $pdo->prepare($query);
            $statement->bindValue(1, $movie_id, \PDO::PARAM_INT);
            $statement->execute();
            $statement->setFetchMode(\PDO::FETCH_OBJ);

            $companies = $statement->fetchAll();

        } catch (\Throwable $exception) {
            echo " Error #" . $exception->getCode() . " : " . $exception->getMessage()
                . " in " . $exception->getFile() . " on line " . $exception->getLine();
            exit();
        }

        return $companies;
    }

    public function getMovieGenres(int $movie_id): array
    {
        try {
            $pdo = $this->connection->getPDO();
            $query = "SELECT id, genre_name FROM rest_server.genre INNER JOIN rest_server.movie_genre ON genre.id = movie_genre.genre_id WHERE movie_id = ?;";

            $statement = $pdo->prepare($query);
            $statement->bindValue(1, $movie_id, \PDO::PARAM_INT);
            $statement->execute();
            $statement->setFetchMode(\PDO::FETCH_OBJ);

            $genres = $statement->fetchAll();

        } catch (\Throwable $exception) {
            echo " Error #" . $exception->getCode() . " : " . $exception->getMessage()
                . " in " . $exception->getFile() . " on line " . $exception->getLine();
            exit();
        }

        return $genres;
    }

    public function getMovieLanguages(int $movie_id): array
    {
        try {
            $pdo = $this->connection->getPDO();
            $query = "SELECT iso_639_1, language_name FROM rest_server.language INNER JOIN rest_server.movie_language ON language.id = movie_language.language_id WHERE movie_id = ?;";

            $statement = $pdo->prepare($query);
            $statement->bindValue(1, $movie_id, \PDO::PARAM_INT);
            $statement->execute();
            $statement->setFetchMode(\PDO::FETCH_OBJ);

            $languages = $statement->fetchAll();

        } catch (\Throwable $exception) {
            echo " Error #" . $exception->getCode() . " : " . $exception->getMessage()
                . " in " . $exception->getFile() . " on line " . $exception->getLine();
            exit();
        }

        return $languages;
    }
}

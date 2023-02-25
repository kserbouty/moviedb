<?php

declare(strict_types=1);

namespace Rest\Server\Repository;

use Rest\Server\Database\Connection;
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

    public function getMovieDetails(int $movie_id): bool|Movie
    {
        try {
            $pdo = $this->connection->getPDO();
            $query = "SELECT * FROM rest_server.movie WHERE id = ?;";

            $statement = $pdo->prepare($query);
            $statement->bindValue(1, $movie_id, \PDO::PARAM_INT);
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

    public function getMovieCompanies(int $movie_id): bool|array
    {
        try {
            $pdo = $this->connection->getPDO();
            $query = "SELECT id, company_name, logo_path, origin_country FROM rest_server.company INNER JOIN rest_server.movie_company ON company.id = movie_company.company_id WHERE movie_id = ?;";

            $statement = $pdo->prepare($query);
            $statement->bindValue(1, $movie_id, \PDO::PARAM_INT);
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

    public function getMovieGenres(int $movie_id): bool|array
    {
        try {
            $pdo = $this->connection->getPDO();
            $query = "SELECT id, genre_name FROM rest_server.genre INNER JOIN rest_server.movie_genre ON genre.id = movie_genre.genre_id WHERE movie_id = ?;";

            $statement = $pdo->prepare($query);
            $statement->bindValue(1, $movie_id, \PDO::PARAM_INT);
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

    public function getMovieLanguages(int $movie_id): bool|array
    {
        try {
            $pdo = $this->connection->getPDO();
            $query = "SELECT iso_639_1, language_name FROM rest_server.language INNER JOIN rest_server.movie_language ON language.id = movie_language.language_id WHERE movie_id = ?;";

            $statement = $pdo->prepare($query);
            $statement->bindValue(1, $movie_id, \PDO::PARAM_INT);
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
}

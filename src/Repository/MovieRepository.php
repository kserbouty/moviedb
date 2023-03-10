<?php

declare(strict_types=1);

namespace Rest\Server\Repository;

use Rest\Server\Database\Connection;
use Rest\Server\Model\Company;
use Rest\Server\Model\Genre;
use Rest\Server\Model\Language;
use Rest\Server\Model\Movie;

class MovieRepository
{
    public function getMovieDetails(int $movie_id): bool|Movie
    {
        $connection = new Connection();

        $pdo = $connection->getPDO();
        $query = "SELECT * FROM movie_db.movie WHERE movie_id = ?;";

        $statement = $pdo->prepare($query);
        $statement->bindValue(1, $movie_id, \PDO::PARAM_INT);
        $statement->execute();
        $statement->setFetchMode(\PDO::FETCH_CLASS, Movie::class);

        return $statement->fetch();
    }

    public function getMovieCompanies(int $movie_id): array
    {
        $connection = new Connection();

        $pdo = $connection->getPDO();
        $query = "SELECT company_id, company_name, company_logo_path, company_origin_country FROM movie_db.company INNER JOIN movie_db.movies_companies ON company.company_id = movies_companies.companies_id WHERE movies_id = ?;";

        $statement = $pdo->prepare($query);
        $statement->bindValue(1, $movie_id, \PDO::PARAM_INT);
        $statement->execute();
        $statement->setFetchMode(\PDO::FETCH_CLASS, Company::class);

        return $statement->fetchAll();
    }

    public function getMovieGenres(int $movie_id): array
    {
        $connection = new Connection();

        $pdo = $connection->getPDO();
        $query = "SELECT genre_id, genre_name FROM movie_db.genre INNER JOIN movie_db.movies_genres ON genre.genre_id = movies_genres.genres_id WHERE movies_id = ?;";

        $statement = $pdo->prepare($query);
        $statement->bindValue(1, $movie_id, \PDO::PARAM_INT);
        $statement->execute();
        $statement->setFetchMode(\PDO::FETCH_CLASS, Genre::class);

        return $statement->fetchAll();
    }

    public function getMovieLanguages(int $movie_id): array
    {
        $connection = new Connection();

        $pdo = $connection->getPDO();
        $query = "SELECT language_iso, language_name FROM movie_db.language INNER JOIN movie_db.movies_languages ON language.language_id = movies_languages.languages_id WHERE movies_id = ?;";

        $statement = $pdo->prepare($query);
        $statement->bindValue(1, $movie_id, \PDO::PARAM_INT);
        $statement->execute();
        $statement->setFetchMode(\PDO::FETCH_CLASS, Language::class);

        return $statement->fetchAll();
    }
}

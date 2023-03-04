<?php

declare(strict_types=1);

namespace Rest\Server\Controller;

use Rest\Server\Http\Response;
use Rest\Server\Repository\CollectionRepository;
use Rest\Server\Repository\CompanyRepository;
use Rest\Server\Repository\MovieRepository;
use Rest\Server\Service\Builder;

class MovieController extends Builder
{
    public function getMovie(int $movie_id): string
    {
        $response = new Response();
        $repository = new MovieRepository();
        $movie = $repository->getMovieDetails($movie_id);

        if (is_bool($movie)) {

            $error = (object)[
                'status_message' => 'Resources not found in the database.',
                'status_code' => 404
            ];

            return $response->jsonResponse($error, 404);
        }

        $data = $this->buildMovie($movie, $this);

        return $response->jsonResponse($data, 200);
    }

    public function getCollection(?int $collection_id): ?object
    {
        if (is_int($collection_id)) {

            $repository = new CollectionRepository();
            $collection = $repository->getCollectionDetails($collection_id);

            return $this->buildCollection($collection);
        }

        return null;
    }

    public function getGenres(int $movie_id): array
    {
        $array = [];

        $repository = new MovieRepository();
        $genres = $repository->getMovieGenres($movie_id);

        foreach ($genres as $genre) {
            $object = $this->buildGenre($genre);
            $array[] = $object;
        }

        return $array;
    }

    public function getProductionCompanies(int $movie_id): array
    {
        $array = [];

        $repository = new MovieRepository();
        $companies = $repository->getMovieCompanies($movie_id);

        foreach ($companies as $company) {
            $object = $this->buildCompany($company);
            $array[] = $object;
        }

        return $array;
    }

    public function getProductionCountries(int $movie_id): array
    {
        $array = [];
        $array_countries = [];

        $companies = $this->getProductionCompanies($movie_id);

        $repository = new CompanyRepository();

        foreach ($companies as $company) {
            $array_countries[] = $repository->getCompanyCountries($company->id);
        }

        $array_countries = array_unique($array_countries, SORT_REGULAR);

        foreach ($array_countries as $array_objects) {
            foreach ($array_objects as $object) {
                $array[] = $this->buildCountry($object);
            }
        }

        return $array;
    }

    public function getSpokenLanguages(int $movie_id): array
    {
        $array = [];

        $repository = new MovieRepository();
        $languages = $repository->getMovieLanguages($movie_id);

        foreach ($languages as $language) {
            $object = $this->buildLanguage($language);
            $array[] = $object;
        }

        return $array;
    }
}

<?php

declare(strict_types=1);

namespace Rest\Server\Controller;

use Rest\Server\Http\Response;
use Rest\Server\Repository\CompanyRepository;
use Rest\Server\Repository\MovieRepository;

class MovieController
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

        $data = $this->buildMovie($movie);

        return $response->jsonResponse($data, 200);
    }

    private function getCollection(?int $collection_id): ?object
    {
        if (is_int($collection_id)) {

            return (object)[];
        }

        return null;
    }

    private function getGenres(int $movie_id): array
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

    private function getProductionCompanies(int $movie_id): array
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

    private function getProductionCountries(int $movie_id): array
    {
        $array = [];
        $array_countries = [];

        $repository = new MovieRepository();
        $companies = $repository->getMovieCompanies($movie_id);

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

    private function getSpokenLanguages(int $movie_id): array
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

    private function buildMovie(object $movie): object
    {
        return (object)[
            'adult' => $movie->adult,
            'backdrop_path' => $movie->backdrop_path,
            'belongs_to_collection' => $this->getCollection($movie->id),
            'budget' => $movie->budget,
            'genres' => $this->getGenres($movie->id),
            'homepage' => $movie->homepage,
            'id' => $movie->id,
            'imdb_id' => $movie->imdb_id,
            'original_language' => $movie->original_language,
            'original_title' => $movie->original_title,
            'overview' => $movie->overview,
            'popularity' => $movie->popularity,
            'poster_path' => $movie->poster_path,
            'production_companies' => $this->getProductionCompanies($movie->id),
            'production_countries' => $this->getProductionCountries($movie->id),
            'release_date' => $movie->release_date,
            'revenue' => $movie->revenue,
            'runtime' => $movie->runtime,
            'spoken_languages' => $this->getSpokenLanguages($movie->id),
            'status' => $movie->status,
            'tagline' => $movie->tagline,
            'title' => $movie->title,
            'video' => $movie->video,
            'vote_average' => $movie->vote_average,
            'vote_count' => $movie->vote_count
        ];
    }

    private function buildCompany(object $company): object
    {
        return (object)[
            'name' => $company->company_name,
            'id' => $company->id,
            'logo_path' => $company->logo_path,
            'origin_country' => $company->origin_country
        ];
    }

    private function buildCountry(object $country): object
    {
        return (object)[
            'iso_3166_1' => $country->iso_3166_1,
            'name' => $country->country_name
        ];
    }

    private function buildGenre(object $genre): object
    {
        return (object)[
            'id' => $genre->id,
            'name' => $genre->genre_name
        ];
    }

    private function buildLanguage(object $language): object
    {
        return (object)[
            'iso_639_1' => $language->iso_639_1,
            'name' => $language->language_name
        ];
    }
}

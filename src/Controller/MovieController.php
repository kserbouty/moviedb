<?php

declare(strict_types=1);

namespace Rest\Server\Controller;

use Rest\Server\Entity\Collection;
use Rest\Server\Entity\Company;
use Rest\Server\Entity\Country;
use Rest\Server\Entity\Genre;
use Rest\Server\Entity\Language;
use Rest\Server\Entity\Movie;
use Rest\Server\Repository\CompanyRepository;
use Rest\Server\Repository\MovieRepository;

class MovieController
{
    public function getMovie(int $movie_id): bool|object
    {
        $repository = new MovieRepository();
        $movie = $repository->getMovieDetails($movie_id);

        return $this->buildMovie($movie);
    }

    private function getCollection(?int $collection_id): ?Collection
    {
        if (is_int($collection_id)) {

            return new Collection();
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
            $array_countries[] = $repository->getCompanyCountries($company->getId());
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

    private function buildMovie(Movie $movie): object
    {
        return (object)[
            'adult' => $movie->isAdult(),
            'backdrop_path' => $movie->getBackdropPath(),
            'belongs_to_collection' => $this->getCollection($movie->getCollectionId()),
            'budget' => $movie->getBudget(),
            'genres' => $this->getGenres($movie->getId()),
            'homepage' => $movie->getHomepage(),
            'id' => $movie->getId(),
            'imdb_id' => $movie->getImdb(),
            'original_language' => $movie->getOriginalLanguage(),
            'original_title' => $movie->getOriginalTitle(),
            'overview' => $movie->getOverview(),
            'popularity' => $movie->getPopularity(),
            'poster_path' => $movie->getPosterPath(),
            'production_companies' => $this->getProductionCompanies($movie->getId()),
            'production_countries' => $this->getProductionCountries($movie->getId()),
            'release_date' => $movie->getReleaseDate(),
            'revenue' => $movie->getRevenue(),
            'runtime' => $movie->getRuntime(),
            'spoken_languages' => $this->getSpokenLanguages($movie->getId()),
            'status' => $movie->getStatus(),
            'tagline' => $movie->getTagline(),
            'title' => $movie->getTitle(),
            'video' => $movie->hasVideo(),
            'vote_average' => $movie->getVoteAverage(),
            'vote_count' => $movie->getVoteCount()
        ];
    }

    private function buildCompany(Company $company): object
    {
        return (object)[
            'name' => $company->getName(),
            'id' => $company->getId(),
            'logo_path' => $company->getLogoPath(),
            'origin_country' => $company->getOriginCountry()
        ];
    }

    private function buildCountry(Country $country): object
    {
        return (object)[
            'iso_3166_1' => $country->getIso(),
            'name' => $country->getName()
        ];
    }

    private function buildGenre(Genre $genre): object
    {
        return (object)[
            'id' => $genre->getId(),
            'name' => $genre->getName()
        ];
    }

    private function buildLanguage(Language $language): object
    {
        return (object)[
            'iso_639_1' => $language->getIso(),
            'name' => $language->getName()
        ];
    }
}

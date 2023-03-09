<?php

namespace Rest\Server\Service;

use Rest\Server\Controller\MovieController;
use Rest\Server\Model\Collection;
use Rest\Server\Model\Company;
use Rest\Server\Model\Country;
use Rest\Server\Model\Genre;
use Rest\Server\Model\Language;
use Rest\Server\Model\Movie;

class MovieBuilder
{
    protected function buildMovie(Movie $movie, MovieController $controller): object
    {
        return (object)[
            'adult' => $movie->isMovieAdult(),
            'backdrop_path' => $movie->getMovieBackdropPath(),
            'belongs_to_collection' => $controller->getCollection($movie->getMovieCollection()),
            'budget' => $movie->getMovieBudget(),
            'genres' => $controller->getGenres($movie->getMovieId()),
            'homepage' => $movie->getMovieHomepage(),
            'id' => $movie->getMovieId(),
            'imdb_id' => $movie->getMovieImdb(),
            'original_language' => $movie->getMovieOriginalLanguage(),
            'original_title' => $movie->getMovieOriginalTitle(),
            'overview' => $movie->getMovieOverview(),
            'popularity' => $movie->getMoviePopularity(),
            'poster_path' => $movie->getMoviePosterPath(),
            'production_companies' => $controller->getProductionCompanies($movie->getMovieId()),
            'production_countries' => $controller->getProductionCountries($movie->getMovieId()),
            'release_date' => $movie->getMovieReleaseDate(),
            'revenue' => $movie->getMovieRevenue(),
            'runtime' => $movie->getMovieRuntime(),
            'spoken_languages' => $controller->getSpokenLanguages($movie->getMovieId()),
            'status' => $movie->getMovieStatus(),
            'tagline' => $movie->getMovieTagline(),
            'title' => $movie->getMovieTitle(),
            'video' => $movie->hasMovieVideo(),
            'vote_average' => $movie->getMovieVoteAverage(),
            'vote_count' => $movie->getMovieVoteCount()
        ];
    }

    protected function buildCollection(Collection $collection): object
    {
        return (object)[
            'id' => $collection->getCollectionId(),
            'name' => $collection->getCollectionName(),
            'overview' => $collection->getCollectionOverview(),
            'poster_path' => $collection->getCollectionPosterPath(),
            'backdrop_path' => $collection->getCollectionBackdropPath()
        ];
    }

    protected function buildCompany(Company $company): object
    {
        return (object)[
            'name' => $company->getCompanyName(),
            'id' => $company->getCompanyId(),
            'logo_path' => $company->getCompanyLogoPath(),
            'origin_country' => $company->getCompanyOriginCountry()
        ];
    }

    protected function buildCountry(Country $country): object
    {
        return (object)[
            'iso_3166_1' => $country->getCountryIso(),
            'name' => $country->getCountryName()
        ];
    }

    protected function buildGenre(Genre $genre): object
    {
        return (object)[
            'id' => $genre->getGenreId(),
            'name' => $genre->getGenreName()
        ];
    }

    protected function buildLanguage(Language $language): object
    {
        return (object)[
            'iso_639_1' => $language->getLanguageName(),
            'name' => $language->getLanguageIso()
        ];
    }
}
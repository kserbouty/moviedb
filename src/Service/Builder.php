<?php

namespace Rest\Server\Service;

use Rest\Server\Controller\MovieController;

class Builder
{
    protected function buildMovie(object $movie, MovieController $controller): object
    {
        return (object)[
            'adult' => $movie->adult,
            'backdrop_path' => $movie->backdrop_path,
            'belongs_to_collection' => $controller->getCollection($movie->id),
            'budget' => $movie->budget,
            'genres' => $controller->getGenres($movie->id),
            'homepage' => $movie->homepage,
            'id' => $movie->id,
            'imdb_id' => $movie->imdb_id,
            'original_language' => $movie->original_language,
            'original_title' => $movie->original_title,
            'overview' => $movie->overview,
            'popularity' => $movie->popularity,
            'poster_path' => $movie->poster_path,
            'production_companies' => $controller->getProductionCompanies($movie->id),
            'production_countries' => $controller->getProductionCountries($movie->id),
            'release_date' => $movie->release_date,
            'revenue' => $movie->revenue,
            'runtime' => $movie->runtime,
            'spoken_languages' => $controller->getSpokenLanguages($movie->id),
            'status' => $movie->status,
            'tagline' => $movie->tagline,
            'title' => $movie->title,
            'video' => $movie->video,
            'vote_average' => $movie->vote_average,
            'vote_count' => $movie->vote_count
        ];
    }

    protected function buildCompany(object $company): object
    {
        return (object)[
            'name' => $company->company_name,
            'id' => $company->id,
            'logo_path' => $company->logo_path,
            'origin_country' => $company->origin_country
        ];
    }

    protected function buildCountry(object $country): object
    {
        return (object)[
            'iso_3166_1' => $country->iso_3166_1,
            'name' => $country->country_name
        ];
    }

    protected function buildGenre(object $genre): object
    {
        return (object)[
            'id' => $genre->id,
            'name' => $genre->genre_name
        ];
    }

    protected function buildLanguage(object $language): object
    {
        return (object)[
            'iso_639_1' => $language->iso_639_1,
            'name' => $language->language_name
        ];
    }
}
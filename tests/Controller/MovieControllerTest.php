<?php

namespace Rest\Tests\Controller;

use PHPUnit\Framework\TestCase;
use Rest\Server\Controller\MovieController;

class MovieControllerTest extends TestCase
{
    public function testGetMovieReturnExpectedFormat(): void
    {
        $controller = new MovieController();

        $this->assertIsObject($controller->getMovie(1));
    }

    public function testGetMovieWithUnknownIdReturnBoolean(): void
    {
        $controller = new MovieController();

        $this->assertIsBool($controller->getMovie(99));
    }

    public function testGetCollectionWithoutDataReturnNull(): void
    {
        $controller = new MovieController();

        $collection = $controller->getCollection(null);

        $this->assertNull($collection);
    }

    public function testGetCollectionWithDataReturnExpectedStructure(): void
    {
        $controller = new MovieController();

        $collection = $controller->getCollection(1);

        $this->assertIsObject($collection);
    }

    public function testGetMovieGenresReturnExpectedStructure(): void
    {
        $controller = new MovieController();
        $genres = $controller->getGenres(1);

        foreach ($genres as $genre)
        {
            $this->assertIsObject($genre);
        }
    }

    public function testGetProductionCompaniesReturnExpectedStructure(): void
    {
        $controller = new MovieController();
        $companies = $controller->getProductionCompanies(1);

        foreach ($companies as $company)
        {
            $this->assertIsObject($company);
        }
    }

    public function testGetProductionCountriesReturnExpectedStructure(): void
    {
        $controller = new MovieController();
        $countries = $controller->getProductionCountries(1);

        foreach ($countries as $country)
        {
            $this->assertIsObject($country);
        }
    }

    public function testGetMovieLanguagesReturnExpectedStructure(): void
    {
        $controller = new MovieController();
        $languages = $controller->getSpokenLanguages(1);

        foreach ($languages as $language)
        {
            $this->assertIsObject($language);
        }
    }
}

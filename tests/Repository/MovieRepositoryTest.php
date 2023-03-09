<?php

namespace Rest\Tests\Repository;

use PHPUnit\Framework\TestCase;
use Rest\Server\Model\Company;
use Rest\Server\Model\Genre;
use Rest\Server\Model\Language;
use Rest\Server\Model\Movie;
use Rest\Server\Repository\MovieRepository;

class
MovieRepositoryTest extends TestCase
{
    public function testGetMovieReturnExpectedInstance(): void
    {
        $repository = new MovieRepository();

        $this->assertInstanceOf(Movie::class, $repository->getMovieDetails(1));
    }

    public function testGetMovieCompaniesReturnExpectedInstances(): void
    {
        $repository = new MovieRepository();

        $companies = $repository->getMovieCompanies(1);

        foreach ($companies as $company) {
            $this->assertInstanceOf(Company::class, $company);
        }
    }

    public function testGetMovieGenresReturnExpectedInstances(): void
    {
        $repository = new MovieRepository();

        $genres = $repository->getMovieGenres(1);

        foreach ($genres as $genre) {
            $this->assertInstanceOf(Genre::class, $genre);
        }
    }

    public function testGetMovieLanguagesReturnExpectedInstances(): void
    {
        $repository = new MovieRepository();

        $languages = $repository->getMovieLanguages(1);

        foreach ($languages as $language) {
            $this->assertInstanceOf(Language::class, $language);
        }
    }

    public function testFetchMoviesWithMaliciousIdTriggerException(): void
    {
        $this->expectException(\TypeError::class);

        $repository = new MovieRepository();
        $malicious_id = "1; DROP TABLE movie";

        $repository->getMovieDetails($malicious_id);
    }

    public function testFetchCompaniesWithMaliciousIdTriggerException(): void
    {
        $this->expectException(\TypeError::class);

        $repository = new MovieRepository();
        $malicious_id = "1; DROP TABLE company";

        $repository->getMovieCompanies($malicious_id);
    }

    public function testFetchGenresWithMaliciousIdTriggerException(): void
    {
        $this->expectException(\TypeError::class);

        $repository = new MovieRepository();
        $malicious_id = "1; DROP TABLE genre";

        $repository->getMovieGenres($malicious_id);
    }

    public function testFetchLanguagesWithMaliciousIdTriggerException(): void
    {
        $this->expectException(\TypeError::class);

        $repository = new MovieRepository();
        $malicious_id = "1; DROP TABLE language";

        $repository->getMovieLanguages($malicious_id);
    }
}

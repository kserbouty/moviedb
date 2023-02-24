<?php

namespace Rest\Tests\Repository;

use PHPUnit\Framework\TestCase;
use Rest\Server\Entity\Company;
use Rest\Server\Entity\Genre;
use Rest\Server\Entity\Language;
use Rest\Server\Entity\Movie;
use Rest\Server\Repository\MovieRepository;

class MovieRepositoryTest extends TestCase
{
    public function testRepositoryReturnCorrectInstances(): void
    {
        $repository = new MovieRepository();

        $this->assertInstanceOf(Movie::class, $repository->getMovieDetails(1));
        $this->assertContainsOnlyInstancesOf(Company::class, $repository->getMovieCompanies(1));
        $this->assertContainsOnlyInstancesOf(Genre::class, $repository->getMovieGenres(1));
        $this->assertContainsOnlyInstancesOf(Language::class, $repository->getMovieLanguages(1));
    }

    public function testInjectionOnMovieTriggerThrowable(): void
    {
        $repository = new MovieRepository();
        $malicious_id = "1; DROP TABLE movie";

        $this->expectException(\Throwable::class);
        $repository->getMovieDetails($malicious_id);
    }

    public function testInjectionOnCompaniesTriggerThrowable(): void
    {
        $repository = new MovieRepository();
        $malicious_id = "1; DROP TABLE company";

        $this->expectException(\Throwable::class);
        $repository->getMovieCompanies($malicious_id);
    }

    public function testInjectionOnGenresTriggerThrowable(): void
    {
        $repository = new MovieRepository();
        $malicious_id = "1; DROP TABLE genre";

        $this->expectException(\Throwable::class);
        $repository->getMovieGenres($malicious_id);
    }

    public function testInjectionOnLanguagesTriggerThrowable(): void
    {
        $repository = new MovieRepository();
        $malicious_id = "1; DROP TABLE language";

        $this->expectException(\Throwable::class);
        $repository->getMovieLanguages($malicious_id);
    }
}

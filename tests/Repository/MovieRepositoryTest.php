<?php

namespace Rest\Tests\Repository;

use PHPUnit\Framework\TestCase;
use Rest\Server\Repository\MovieRepository;

class
MovieRepositoryTest extends TestCase
{
    public function testFetchMovies_withMaliciousId_shouldTriggerThrowable(): void
    {
        $repository = new MovieRepository();
        $malicious_id = "1; DROP TABLE movie";

        $this->expectException(\Throwable::class);
        $repository->getMovieDetails($malicious_id);
    }

    public function testFetchMovies_withWrongId_shouldReturnEmpty(): void
    {
        $repository = new MovieRepository();
        $wrong_id = 99;

        $this->assertEmpty($repository->getMovieDetails($wrong_id));
    }

    public function testFetchCompanies_withMaliciousId_shouldTriggerThrowable(): void
    {
        $repository = new MovieRepository();
        $malicious_id = "1; DROP TABLE movie";

        $this->expectException(\Throwable::class);
        $repository->getMovieCompanies($malicious_id);
    }

    public function testFetchCompanies_withWrongId_shouldReturnEmpty(): void
    {
        $repository = new MovieRepository();
        $wrong_id = 99;

        $this->assertEmpty($repository->getMovieCompanies($wrong_id));
    }

    public function testFetchGenres_withMaliciousId_shouldTriggerThrowable(): void
    {
        $repository = new MovieRepository();
        $malicious_id = "1; DROP TABLE movie";

        $this->expectException(\Throwable::class);
        $repository->getMovieGenres($malicious_id);
    }

    public function testFetchGenres_withWrongId_shouldReturnEmpty(): void
    {
        $repository = new MovieRepository();
        $wrong_id = 99;

        $this->assertEmpty($repository->getMovieGenres($wrong_id));
    }

    public function testFetchLanguages_withMaliciousId_shouldTriggerThrowable(): void
    {
        $repository = new MovieRepository();
        $malicious_id = "1; DROP TABLE movie";

        $this->expectException(\Throwable::class);
        $repository->getMovieLanguages($malicious_id);
    }

    public function testFetchLanguages_withWrongId_shouldReturnEmpty(): void
    {
        $repository = new MovieRepository();
        $wrong_id = 99;

        $this->assertEmpty($repository->getMovieLanguages($wrong_id));
    }
}

<?php

namespace Rest\Tests\Model;

use PHPUnit\Framework\TestCase;
use Rest\Server\Model\Movie;

class MovieTest extends TestCase
{
    public function testGetMoviePropertiesReturnExpectedValues(): void
    {
        $movie = new Movie();
        $movie->setMovieId(1);
        $movie->setMovieAdult(false);
        $movie->setMovieBackdropPath('movie_backdrop');
        $movie->setMovieCollection(1);
        $movie->setMovieBudget(7000);
        $movie->setMovieHomepage('movie_homepage');
        $movie->setMovieImdb('movie_imdb');
        $movie->setMovieOriginalLanguage('movie_original_language');
        $movie->setMovieOriginalTitle('movie_original_title');
        $movie->setMovieOverview('movie_overview');
        $movie->setMoviePopularity(4);
        $movie->setMoviePosterPath('movie_poster_path');
        $movie->setMovieReleaseDate('movie_release');
        $movie->setMovieRevenue(1700000);
        $movie->setMovieRuntime(120);
        $movie->setMovieStatus('movie_status');
        $movie->setMovieTagline('movie_tagline');
        $movie->setMovieTitle('movie_title');
        $movie->setMovieVideo(true);
        $movie->setMovieVoteAverage(85);
        $movie->setMovieVoteCount(7999);

        $this->assertSame(1, $movie->getMovieId());
        $this->assertSame(false, $movie->isMovieAdult());
        $this->assertSame('movie_backdrop', $movie->getMovieBackdropPath());
        $this->assertSame(1, $movie->getMovieCollection());
        $this->assertSame(7000, $movie->getMovieBudget());
        $this->assertSame('movie_homepage', $movie->getMovieHomepage());
        $this->assertSame('movie_imdb', $movie->getMovieImdb());
        $this->assertSame('movie_original_language', $movie->getMovieOriginalLanguage());
        $this->assertSame('movie_original_title', $movie->getMovieOriginalTitle());
        $this->assertSame('movie_overview', $movie->getMovieOverview());
        $this->assertSame(4, $movie->getMoviePopularity());
        $this->assertSame('movie_poster_path', $movie->getMoviePosterPath());
        $this->assertSame('movie_release', $movie->getMovieReleaseDate());
        $this->assertSame(1700000, $movie->getMovieRevenue());
        $this->assertSame(120, $movie->getMovieRuntime());
        $this->assertSame('movie_status', $movie->getMovieStatus());
        $this->assertSame('movie_tagline', $movie->getMovieTagline());
        $this->assertSame('movie_title', $movie->getMovieTitle());
        $this->assertSame(true, $movie->hasMovieVideo());
        $this->assertSame(85, $movie->getMovieVoteAverage());
        $this->assertSame(7999, $movie->getMovieVoteCount());
    }
}
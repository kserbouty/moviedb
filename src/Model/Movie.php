<?php

declare(strict_types=1);

namespace Rest\Server\Model;

class Movie
{
    private int $movie_id;
    private bool $movie_adult;
    private ?string $movie_backdrop_path;
    private ?int $movie_collection;
    private int $movie_budget;
    private ?string $movie_homepage;
    private ?string $movie_imdb;
    private string $movie_original_language;
    private string $movie_original_title;
    private ?string $movie_overview;
    private int $movie_popularity;
    private ?string $movie_poster_path;
    private string $movie_release_date;
    private int $movie_revenue;
    private ?int $movie_runtime;
    private string $movie_status;
    private ?string $movie_tagline;
    private string $movie_title;
    private bool $movie_video;
    private int $movie_vote_average;
    private int $movie_vote_count;

    public function getMovieId(): int
    {
        return $this->movie_id;
    }

    public function isMovieAdult(): bool
    {
        return $this->movie_adult;
    }

    public function getMovieBackdropPath(): ?string
    {
        return $this->movie_backdrop_path;
    }

    public function getMovieCollection(): ?int
    {
        return $this->movie_collection;
    }

    public function getMovieBudget(): int
    {
        return $this->movie_budget;
    }

    public function getMovieHomepage(): ?string
    {
        return $this->movie_homepage;
    }

    public function getMovieImdb(): ?string
    {
        return $this->movie_imdb;
    }

    public function getMovieOriginalLanguage(): string
    {
        return $this->movie_original_language;
    }

    public function getMovieOriginalTitle(): string
    {
        return $this->movie_original_title;
    }

    public function getMovieOverview(): ?string
    {
        return $this->movie_overview;
    }

    public function getMoviePopularity(): int
    {
        return $this->movie_popularity;
    }

    public function getMoviePosterPath(): ?string
    {
        return $this->movie_poster_path;
    }

    public function getMovieReleaseDate(): string
    {
        return $this->movie_release_date;
    }

    public function getMovieRevenue(): int
    {
        return $this->movie_revenue;
    }

    public function getMovieRuntime(): ?int
    {
        return $this->movie_runtime;
    }

    public function getMovieStatus(): string
    {
        return $this->movie_status;
    }

    public function getMovieTagline(): ?string
    {
        return $this->movie_tagline;
    }

    public function getMovieTitle(): string
    {
        return $this->movie_title;
    }

    public function hasMovieVideo(): bool
    {
        return $this->movie_video;
    }

    public function getMovieVoteAverage(): int
    {
        return $this->movie_vote_average;
    }

    public function getMovieVoteCount(): int
    {
        return $this->movie_vote_count;
    }

    public function setMovieId(int $movie_id): void
    {
        $this->movie_id = $movie_id;
    }

    public function setMovieAdult(bool $movie_adult): void
    {
        $this->movie_adult = $movie_adult;
    }

    public function setMovieBackdropPath(?string $movie_backdrop_path): void
    {
        $this->movie_backdrop_path = $movie_backdrop_path;
    }

    public function setMovieCollection(?int $movie_collection): void
    {
        $this->movie_collection = $movie_collection;
    }

    public function setMovieBudget(int $movie_budget): void
    {
        $this->movie_budget = $movie_budget;
    }

    public function setMovieHomepage(?string $movie_homepage): void
    {
        $this->movie_homepage = $movie_homepage;
    }

    public function setMovieImdb(?string $movie_imdb): void
    {
        $this->movie_imdb = $movie_imdb;
    }

    public function setMovieOriginalLanguage(string $movie_original_language): void
    {
        $this->movie_original_language = $movie_original_language;
    }

    public function setMovieOriginalTitle(string $movie_original_title): void
    {
        $this->movie_original_title = $movie_original_title;
    }

    public function setMovieOverview(?string $movie_overview): void
    {
        $this->movie_overview = $movie_overview;
    }

    public function setMoviePopularity(int $movie_popularity): void
    {
        $this->movie_popularity = $movie_popularity;
    }

    public function setMoviePosterPath(?string $movie_poster_path): void
    {
        $this->movie_poster_path = $movie_poster_path;
    }

    public function setMovieReleaseDate(string $movie_release_date): void
    {
        $this->movie_release_date = $movie_release_date;
    }

    public function setMovieRevenue(int $movie_revenue): void
    {
        $this->movie_revenue = $movie_revenue;
    }

    public function setMovieRuntime(?int $movie_runtime): void
    {
        $this->movie_runtime = $movie_runtime;
    }

    public function setMovieStatus(string $movie_status): void
    {
        $this->movie_status = $movie_status;
    }

    public function setMovieTagline(?string $movie_tagline): void
    {
        $this->movie_tagline = $movie_tagline;
    }

    public function setMovieTitle(string $movie_title): void
    {
        $this->movie_title = $movie_title;
    }

    public function setMovieVideo(bool $movie_video): void
    {
        $this->movie_video = $movie_video;
    }

    public function setMovieVoteAverage(int $movie_vote_average): void
    {
        $this->movie_vote_average = $movie_vote_average;
    }

    public function setMovieVoteCount(int $movie_vote_count): void
    {
        $this->movie_vote_count = $movie_vote_count;
    }
}
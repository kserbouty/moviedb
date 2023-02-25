<?php

declare(strict_types=1);

namespace Rest\Server\Entity;

class Movie
{
    private int $id;
    private bool $adult;
    private ?string $backdrop_path;
    private ?int $collection_id;
    private int $budget;
    private ?string $homepage;
    private ?string $imdb_id;
    private string $original_language;
    private string $original_title;
    private ?string $overview;
    private int $popularity;
    private ?string $poster_path;
    private string $release_date;
    private int $revenue;
    private ?int $runtime;
    private string $status;
    private ?string $tagline;
    private string $title;
    private bool $video;
    private int $vote_average;
    private int $vote_count;

    public function getId(): int
    {
        return $this->id;
    }

    public function isAdult(): bool
    {
        return $this->adult;
    }

    public function getBackdropPath(): ?string
    {
        return $this->backdrop_path;
    }

    public function getCollectionId(): ?int
    {
        return $this->collection_id;
    }

    public function getBudget(): int
    {
        return $this->budget;
    }

    public function getHomepage(): ?string
    {
        return $this->homepage;
    }

    public function getImdb(): ?string
    {
        return $this->imdb_id;
    }

    public function getOriginalLanguage(): string
    {
        return $this->original_language;
    }

    public function getOriginalTitle(): string
    {
        return $this->original_title;
    }

    public function getOverview(): ?string
    {
        return $this->overview;
    }

    public function getPopularity(): int
    {
        return $this->popularity;
    }

    public function getPosterPath(): ?string
    {
        return $this->poster_path;
    }

    public function getReleaseDate(): string
    {
        return $this->release_date;
    }

    public function getRevenue(): int
    {
        return $this->revenue;
    }

    public function getRuntime(): ?int
    {
        return $this->runtime;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getTagline(): ?string
    {
        return $this->tagline;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function hasVideo(): bool
    {
        return $this->video;
    }

    public function getVoteAverage(): int
    {
        return $this->vote_average;
    }

    public function getVoteCount(): int
    {
        return $this->vote_count;
    }
}

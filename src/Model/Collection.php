<?php

declare(strict_types=1);

namespace Rest\Server\Model;

class Collection
{
    private int $collection_id;
    private string $collection_name;
    private string $collection_overview;
    private ?string $collection_poster_path;
    private string $collection_backdrop_path;

    public function getCollectionId(): int
    {
        return $this->collection_id;
    }

    public function getCollectionName(): string
    {
        return $this->collection_name;
    }

    public function getCollectionOverview(): string
    {
        return $this->collection_overview;
    }

    public function getCollectionPosterPath(): ?string
    {
        return $this->collection_poster_path;
    }

    public function getCollectionBackdropPath(): string
    {
        return $this->collection_backdrop_path;
    }

    public function setCollectionId(int $collection_id): void
    {
        $this->collection_id = $collection_id;
    }

    public function setCollectionName(string $collection_name): void
    {
        $this->collection_name = $collection_name;
    }

    public function setCollectionOverview(string $collection_overview): void
    {
        $this->collection_overview = $collection_overview;
    }

    public function setCollectionPosterPath(?string $collection_poster_path): void
    {
        $this->collection_poster_path = $collection_poster_path;
    }

    public function setCollectionBackdropPath(string $collection_backdrop_path): void
    {
        $this->collection_backdrop_path = $collection_backdrop_path;
    }
}
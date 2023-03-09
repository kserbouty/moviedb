<?php

declare(strict_types=1);

namespace Rest\Server\Model;

class Genre
{
    private int $genre_id;
    private string $genre_name;

    public function getGenreId(): int
    {
        return $this->genre_id;
    }

    public function getGenreName(): string
    {
        return $this->genre_name;
    }

    public function setGenreId(int $genre_id): void
    {
        $this->genre_id = $genre_id;
    }

    public function setGenreName(string $genre_name): void
    {
        $this->genre_name = $genre_name;
    }
}
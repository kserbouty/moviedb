<?php

declare(strict_types=1);

namespace Rest\Server\Entity;

class Genre
{
    private int $id;
    private string $genre_name;

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->genre_name;
    }
}

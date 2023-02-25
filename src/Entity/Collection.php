<?php

declare(strict_types=1);

namespace Rest\Server\Entity;

class Collection
{
    private int $id;
    private string $backdrop_path;
    private string $collection_name;
    private string $overview;
    private ?string $poster_path;
}
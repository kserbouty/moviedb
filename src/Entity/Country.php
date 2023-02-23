<?php

declare(strict_types=1);

namespace Rest\Server\Entity;

class Country
{
    private int $id;
    private string $iso_3166_1;
    private string $name;
}
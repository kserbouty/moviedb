<?php

declare(strict_types=1);

namespace Rest\Server\Entity;

class Country
{
    private string $iso_3166_1;
    private string $name;

    public function getIso(): string
    {
        return $this->iso_3166_1;
    }

    public function getName(): string
    {
        return $this->name;
    }
}

<?php

declare(strict_types=1);

namespace Rest\Server\Entity;

class Language
{
    private string $iso_639_1;
    private string $language_name;

    public function getIso(): string
    {
        return $this->iso_639_1;
    }

    public function getName(): string
    {
        return $this->language_name;
    }
}

<?php

declare(strict_types=1);

namespace Rest\Server\Entity;

class Company
{
    private int $id;
    private string $country_id;
    private ?string $logo_path;
    private string $name;

    public function getId(): int
    {
        return $this->id;
    }

    public function getCountryId(): string
    {
        return $this->country_id;
    }

    public function getLogoPath(): ?string
    {
        return $this->logo_path;
    }

    public function getName(): string
    {
        return $this->name;
    }
}

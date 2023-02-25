<?php

declare(strict_types=1);

namespace Rest\Server\Entity;

class Company
{
    private int $id;
    private ?string $logo_path;
    private string $company_name;
    private string $origin_country;

    public function getId(): int
    {
        return $this->id;
    }

    public function getLogoPath(): ?string
    {
        return $this->logo_path;
    }

    public function getName(): string
    {
        return $this->company_name;
    }

    public function getOriginCountry(): string
    {
        return $this->origin_country;
    }
}

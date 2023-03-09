<?php

declare(strict_types=1);

namespace Rest\Server\Model;

class Company
{
    private int $company_id;
    private ?string $company_logo_path;
    private string $company_name;
    private string $company_origin_country;

    public function getCompanyId(): int
    {
        return $this->company_id;
    }

    public function getCompanyLogoPath(): ?string
    {
        return $this->company_logo_path;
    }

    public function getCompanyName(): string
    {
        return $this->company_name;
    }

    public function getCompanyOriginCountry(): string
    {
        return $this->company_origin_country;
    }

    public function setCompanyId(int $company_id): void
    {
        $this->company_id = $company_id;
    }

    public function setCompanyLogoPath(?string $company_logo_path): void
    {
        $this->company_logo_path = $company_logo_path;
    }

    public function setCompanyName(string $company_name): void
    {
        $this->company_name = $company_name;
    }

    public function setCompanyOriginCountry(string $company_origin_country): void
    {
        $this->company_origin_country = $company_origin_country;
    }
}

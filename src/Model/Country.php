<?php

declare(strict_types=1);

namespace Rest\Server\Model;

class Country
{
    private string $country_name;
    private string $country_iso;

    public function getCountryName(): string
    {
        return $this->country_name;
    }

    public function getCountryIso(): string
    {
        return $this->country_iso;
    }

    public function setCountryName(string $country_name): void
    {
        $this->country_name = $country_name;
    }

    public function setCountryIso(string $country_iso): void
    {
        $this->country_iso = $country_iso;
    }
}
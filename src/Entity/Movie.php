<?php

declare(strict_types=1);

namespace Rest\Server\Entity;

class Movie
{
    private int $id;
    private bool $adult;
    private int $budget;
    private array $companies;
    private array $countries;
    private array $genres;
    private ?string $homepage;
    private array $languages;
    private ?string $original_title;
    private ?string $overview;
    private ?string $poster_path;
    private string $release_date;
    private int $revenue;
    private int $runtime;
    private string $status;
    private string $title;
    private ?string $trailer_path;

    public function setCompanies(array $companies): void
    {
        $this->companies = $companies;
    }

    public function setCountries(array $countries): void
    {
        $this->countries = $countries;
    }

    public function setGenres(array $genres): void
    {
        $this->genres = $genres;
    }

    public function setLanguages(array $languages): void
    {
        $this->languages = $languages;
    }
}
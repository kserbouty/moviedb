<?php

declare(strict_types=1);

namespace Rest\Server\Model;

class Language
{
    private string $language_iso;
    private string $language_name;

    public function getLanguageIso(): string
    {
        return $this->language_iso;
    }

    public function getLanguageName(): string
    {
        return $this->language_name;
    }

    public function setLanguageIso(string $language_iso): void
    {
        $this->language_iso = $language_iso;
    }

    public function setLanguageName(string $language_name): void
    {
        $this->language_name = $language_name;
    }
}
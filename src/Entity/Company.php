<?php

declare(strict_types=1);

namespace Rest\Server\Entity;

class Company
{
    private int $id;
    private ?string $logo_path;
    private string $name;
}
<?php

namespace Rest\Tests\Model;

use PHPUnit\Framework\TestCase;
use Rest\Server\Model\Genre;

class GenreTest extends TestCase
{
    public function testGetCountryPropertiesReturnExpectedValues(): void
    {
        $genre = new Genre();
        $genre->setGenreId(1);
        $genre->setGenreName('genre_name');

        $this->assertSame(1, $genre->getGenreId());
        $this->assertSame('genre_name', $genre->getGenreName());
    }
}
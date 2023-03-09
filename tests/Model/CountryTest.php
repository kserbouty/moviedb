<?php

namespace Rest\Tests\Model;

use PHPUnit\Framework\TestCase;
use Rest\Server\Model\Country;

class CountryTest extends TestCase
{
    public function testGetCountryPropertiesReturnExpectedValues(): void
    {
        $country = new Country();
        $country->setCountryName('country_name');
        $country->setCountryIso('country_iso');

        $this->assertSame('country_name', $country->getCountryName());
        $this->assertSame('country_iso', $country->getCountryIso());
    }
}
<?php

namespace Rest\Tests\Repository;

use PHPUnit\Framework\TestCase;
use Rest\Server\Model\Company;
use Rest\Server\Model\Country;
use Rest\Server\Repository\CompanyRepository;

class CompanyRepositoryTest extends TestCase
{
    public function testGetCompanyCountriesReturnExpectedInstances(): void
    {
        $repository = new CompanyRepository();

        $countries = $repository->getCompanyCountries(1);

        foreach ($countries as $country) {
            $this->assertInstanceOf(Country::class, $country);
        }
    }
}
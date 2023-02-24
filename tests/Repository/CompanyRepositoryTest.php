<?php

namespace Rest\Tests\Repository;

use Rest\Server\Entity\Country;
use Rest\Server\Repository\CompanyRepository;
use PHPUnit\Framework\TestCase;

class CompanyRepositoryTest extends TestCase
{
    public function testRepositoryReturnCorrectInstances(): void
    {
        $repository = new CompanyRepository();

        $this->assertContainsOnlyInstancesOf(Country::class, $repository->getCompanyCountries(1));
    }

    public function testInjectionOnCountriesTriggerThrowable(): void
    {
        $repository = new CompanyRepository();
        $malicious_id = "1; DROP TABLE country";

        $this->expectException(\Throwable::class);
        $repository->getCompanyCountries($malicious_id);
    }
}

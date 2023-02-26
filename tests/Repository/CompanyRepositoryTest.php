<?php

namespace Rest\Tests\Repository;

use Rest\Server\Repository\CompanyRepository;
use PHPUnit\Framework\TestCase;

class CompanyRepositoryTest extends TestCase
{

    public function testFetchCountries_withMaliciousId_shouldTriggerThrowable(): void
    {
        $repository = new CompanyRepository();
        $malicious_id = "1; DROP TABLE country";

        $this->expectException(\Throwable::class);
        $repository->getCompanyCountries($malicious_id);
    }

    public function testFetchCountries_withWrongId_shouldReturnEmpty(): void
    {
        $repository = new CompanyRepository();
        $wrong_id = 99;

        $this->assertEmpty($repository->getCompanyCountries($wrong_id));
    }
}

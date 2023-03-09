<?php

namespace Rest\Tests\Model;

use PHPUnit\Framework\TestCase;
use Rest\Server\Model\Company;

class CompanyTest extends TestCase
{
    public function testGetCompanyPropertiesReturnExpectedValues(): void
    {
        $company = new Company();
        $company->setCompanyId(1);
        $company->setCompanyLogoPath('company_logo_path');
        $company->setCompanyName('company_name');
        $company->setCompanyOriginCountry('company_origin_country');

        $this->assertSame(1, $company->getCompanyId());
        $this->assertSame('company_logo_path', $company->getCompanyLogoPath());
        $this->assertSame('company_name', $company->getCompanyName());
        $this->assertSame('company_origin_country', $company->getCompanyOriginCountry());
    }
}
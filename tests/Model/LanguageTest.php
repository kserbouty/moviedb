<?php

namespace Rest\Tests\Model;

use PHPUnit\Framework\TestCase;
use Rest\Server\Model\Language;

class LanguageTest extends TestCase
{
    public function testGetLanguagePropertiesReturnExpectedValues(): void
    {
        $language = new Language();
        $language->setLanguageIso('language_iso');
        $language->setLanguageName('language_name');

        $this->assertSame('language_iso', $language->getLanguageIso());
        $this->assertSame('language_name', $language->getLanguageName());
    }
}
<?php

namespace Rest\Tests\Model;

use PHPUnit\Framework\TestCase;
use Rest\Server\Model\Collection;

class CollectionTest extends TestCase
{
    public function testGetCollectionPropertiesReturnExpectedValues(): void
    {
        $collection = new Collection();
        $collection->setCollectionId(1);
        $collection->setCollectionName('collection_name');
        $collection->setCollectionOverview('collection_overview');
        $collection->setCollectionPosterPath('collection_poster');
        $collection->setCollectionBackdropPath('collection_backdrop');

        $this->assertSame(1, $collection->getCollectionId());
        $this->assertSame('collection_name', $collection->getCollectionName());
        $this->assertSame('collection_overview', $collection->getCollectionOverview());
        $this->assertSame('collection_poster', $collection->getCollectionPosterPath());
        $this->assertSame('collection_backdrop', $collection->getCollectionBackdropPath());
    }
}
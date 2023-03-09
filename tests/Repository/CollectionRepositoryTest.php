<?php

namespace Rest\Tests\Repository;

use PHPUnit\Framework\TestCase;
use Rest\Server\Model\Collection;
use Rest\Server\Repository\CollectionRepository;

class CollectionRepositoryTest extends TestCase
{
    public function testGetCollectionReturnExpectedInstance(): void
    {
        $repository = new CollectionRepository();

        $this->assertInstanceOf(Collection::class, $repository->getCollectionDetails(1));
    }
}
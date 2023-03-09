<?php

declare(strict_types=1);

namespace Rest\Server\Repository;

use Rest\Server\Database\Connection;
use Rest\Server\Model\Collection;

class CollectionRepository
{
    public function getCollectionDetails(int $collection_id): Collection
    {
        $connection = new Connection();

        $pdo = $connection->getPDO();
        $query = "SELECT * FROM movie_db.collection WHERE collection.collection_id = ?;";

        $statement = $pdo->prepare($query);
        $statement->bindValue(1, $collection_id, \PDO::PARAM_INT);
        $statement->execute();
        $statement->setFetchMode(\PDO::FETCH_CLASS, Collection::class);

        return $statement->fetch();
    }
}
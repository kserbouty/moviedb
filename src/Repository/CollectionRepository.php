<?php

declare(strict_types=1);

namespace Rest\Server\Repository;

use Rest\Server\Database\Connection;

class CollectionRepository
{
    private Connection $connection;

    public function __construct()
    {
        $this->connection = new Connection();
    }

    public function getCollectionDetails(int $collection_id): bool|object
    {
        try {
            $pdo = $this->connection->getPDO();
            $query = "SELECT * FROM movie_db.collection WHERE collection.id = ?;";

            $statement = $pdo->prepare($query);
            $statement->bindValue(1, $collection_id, \PDO::PARAM_INT);
            $statement->execute();
            $statement->setFetchMode(\PDO::FETCH_OBJ);

            $collection = $statement->fetch();

        } catch (\Throwable $exception) {
            echo " Error #" . $exception->getCode() . " : " . $exception->getMessage()
                . " in " . $exception->getFile() . " on line " . $exception->getLine();
            exit();
        }

        return $collection;
    }
}
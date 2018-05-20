<?php

use Phalcon\Mvc\Model\Query;

Class BookRepository extends RepositoryBase
{
    public function getAll()
    {
        $query = new Query(
        'SELECT * FROM Book',
        $this->getDI()
        );
        return $query->execute();
    }

    public function executeQuery(string $query)
    {
        $queryBuilder = new Query($query, $this->getDi());
        return $queryBuilder->execute();
    }
}
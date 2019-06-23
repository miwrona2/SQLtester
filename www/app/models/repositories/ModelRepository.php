<?php

use Phalcon\Mvc\Model\Query;

Class ModelRepository extends RepositoryBase
{
    public function getBooks()
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

    public function getGenres()
    {
        $query = new Query(
            'SELECT * FROM Genre',
            $this->getDI()
        );
        return $query->execute();
    }
}
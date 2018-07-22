<?php

use Phalcon\Di\Injectable;

class BookService extends Injectable
{
    protected $bookRepository;

    public function __construct(BookRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    public function getQueryResult(string $query)
    {
        $queryResult = $this->bookRepository->executeQuery($query);
        return $queryResult;
    }
}
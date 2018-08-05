<?php

use Phalcon\Di\Injectable;
use Phalcon\Mvc\Model\Resultset;

class BookService extends Injectable
{
    protected $bookRepository;

    public function __construct(BookRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    public function getQueryResult(string $query)
    {
        try {
            $queryResult = $this->bookRepository->executeQuery($query);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
        return $queryResult;
    }
}
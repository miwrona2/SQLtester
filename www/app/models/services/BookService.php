<?php

use Phalcon\Di\Injectable;
use Phalcon\Mvc\Model\Resultset;

class BookService extends Injectable
{
    protected $bookRepository;

    public function __construct(MainRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    public function getQueryResult(string $query): array
    {
        try {
            if (strpos($query, 'UNION') > -1 || strpos($query, 'union') > -1) {
                $repository = new RawSqlRepository();
                $queryResult = $repository->getRaw($query);
            } else {
                $repository = $this->bookRepository;
                $queryResult = $repository->executeQuery($query)->toArray();
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
        return $queryResult;
    }

    public function getColumnNames(array $queryResult): array
    {
        $columns = [];
        foreach ($queryResult[0] as $k => $v) {
            $columns[] = $k;
        }
        return $columns;
    }
}
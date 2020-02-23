<?php

use Phalcon\Di\Injectable;
use Phalcon\Mvc\Model\Resultset;

class BookService extends Injectable
{
    private $mainRepository;
    private $rawSqlRepository;

    public function __construct(MainRepository $bookRepository, RawSqlRepository $rawSqlRepository)
    {
        $this->mainRepository = $bookRepository;
        $this->rawSqlRepository = $rawSqlRepository;
    }

    public function getQueryResult(string $query): array
    {
        try {
            if (strpos($query, 'UNION') > -1 || strpos($query, 'union') > -1) {
                $queryResult = $this->rawSqlRepository->getRaw($query);
            } else {
                $queryResult = $this->mainRepository->executeQuery($query)->toArray();
            }
        } catch (Exception $e) {
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
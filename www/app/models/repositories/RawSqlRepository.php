<?php


class RawSqlRepository extends \Phalcon\Di\Injectable
{
    private $connection;

    public function __construct()
    {
        $this->connection = $this->db;
    }

    public function getRaw(string $query): array
    {
        $resultSet = $this->connection->query($query);
        $resultSet->setFetchMode(\PDO::FETCH_ASSOC);
        $resultSet = $resultSet->fetchAll($resultSet);
        return $resultSet;
    }

}
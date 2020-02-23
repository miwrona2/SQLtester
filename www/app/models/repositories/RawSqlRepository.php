<?php

class RawSqlRepository extends RepositoryBase
{
    public function getRaw(string $query): array
    {
        $resultSet = $this->db->query($query);
        $resultSet->setFetchMode(\PDO::FETCH_ASSOC);
        $resultSet = $resultSet->fetchAll($resultSet);
        return $resultSet;
    }

}
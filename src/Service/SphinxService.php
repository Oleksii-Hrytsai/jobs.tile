<?php

namespace App\Service;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Exception;

class SphinxService
{
    private $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function fetchAllFromIndex(string $indexName)
    {
        $sql = "SELECT * FROM $indexName";
        try {
            return $this->connection->executeQuery($sql)->fetchAll();
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function fetchConditionFromIndex(string $indexName, array $conditions): array
    {
        $sql = "SELECT * FROM $indexName";

        $whereClauses = [];
        foreach ($conditions as $field => $value) {
            $whereClauses[] = "$field = $value";
        }

        if (!empty($whereClauses)) {
            $sql .= " WHERE " . implode(" AND ", $whereClauses);
        }

        try {
            return $this->connection->executeQuery($sql)->fetchAllAssociative();
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
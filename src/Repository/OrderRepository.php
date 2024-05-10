<?php

namespace App\Repository;

use App\Entity\Orders;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Orders>
 */
class OrderRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Orders::class);
    }

    public function getOrderStatistics(int $page, int $limit, string $groupBy): array
    {
        $offset = ($page - 1) * $limit;
        $groupByClause = $this->getGroupByClause($groupBy);

        $query = $this->getEntityManager()->createQuery(
            "SELECT $groupByClause AS groupValue, COUNT(o.id) AS count
         FROM App\Entity\Orders o
         GROUP BY groupValue
         ORDER BY groupValue DESC"
        )
            ->setMaxResults($limit)
            ->setFirstResult($offset);

        return $query->getResult();
    }

    public function countOrders(string $groupBy): int
    {
        $groupByClause = $this->getGroupByClause($groupBy);

        $query = $this->getEntityManager()->createQuery(
            "SELECT COUNT(DISTINCT $groupByClause)
             FROM App\Entity\Orders o"
        );

        return (int) $query->getSingleScalarResult();
    }

    private function getGroupByClause(string $groupBy): string
    {
        return match ($groupBy) {
            'year' => 'YEAR(o.createDate)',
            'month' => 'CONCAT(YEAR(o.createDate), \'-\', MONTH(o.createDate))',
            'day' => 'CONCAT(YEAR(o.createDate), \'-\', MONTH(o.createDate), \'-\', DAY(o.createDate))',
            default => 'MONTH(o.createDate)'
        };
    }
}

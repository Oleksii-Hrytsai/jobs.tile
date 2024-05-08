<?php

namespace App\Repository;

use App\Entity\Order;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Order>
 */
class OrderRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Order::class);
    }

    public function findOrdersStats($groupBy, $page, $limit)
    {
        $groupByMap = [
            'year' => 'YEAR(o.orderDate)',
            'month' => 'MONTH(o.orderDate)',
            'day' => 'DAY(o.orderDate)'
        ];

        $qb = $this->createQueryBuilder('o')
            ->select("COUNT(o.id) as orderCount, {$groupByMap[$groupBy]} as groupedDate")
            ->groupBy('groupedDate')
            ->setFirstResult(($page - 1) * $limit)
            ->setMaxResults($limit);

        return $qb->getQuery()->getResult();
    }

}

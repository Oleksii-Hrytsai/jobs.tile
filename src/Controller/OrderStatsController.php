<?php

namespace App\Controller;

use App\Entity\Order;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class OrderStatsController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/orders/stats', name: 'app_order_stats')]
    public function getOrderStats(Request $request): JsonResponse
    {
        $page = (int) $request->query->get('page', 1);
        $limit = (int) $request->query->get('limit', 10);
        $groupBy = $request->query->get('groupBy', 'month');

        $queryBuilder = $this->entityManager->createQueryBuilder()
            ->select("COUNT(o.id) as orderCount, SUBSTRING(o.orderDate, 1, {$this->getSubstringLength($groupBy)}) as groupedDate")
            ->from(Order::class, 'o')
            ->groupBy('groupedDate')
            ->setFirstResult(($page - 1) * $limit)
            ->setMaxResults($limit);

        $query = $queryBuilder->getQuery();
        $result = $query->getResult();

        return new JsonResponse([
            'data' => $result,
            'page' => $page,
            'limit' => $limit,
            'totalPages' => ceil(count($result) / $limit)
        ]);
    }

    private function getSubstringLength($groupBy): int
    {
        return ['year' => 4, 'month' => 7, 'day' => 10][$groupBy] ?? 7; // Default to month
    }
}


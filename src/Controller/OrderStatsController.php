<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\OrderRepository;
use Symfony\Component\HttpFoundation\Response;

class OrderStatsController extends AbstractController
{
    #[Route('/orders/stats', name: 'order_stats', methods: ['GET'])]
    public function getOrderStatistics(Request $request, OrderRepository $orderRepository): Response
    {
        $page = max(1, $request->query->getInt('page', 1));
        $limit = $request->query->getInt('limit', 10);

        $groupBy = $request->query->get('groupBy', 'day');

        $statistics = $orderRepository->getOrderStatistics($page, $limit, $groupBy);
        $total = $orderRepository->countOrders($groupBy);

        $totalPages = ceil($total / $limit);

        return $this->json([
            'page' => $page,
            'limit' => $limit,
            'total_pages' => $totalPages,
            'data' => $statistics
        ]);
    }
}

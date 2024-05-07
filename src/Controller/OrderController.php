<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Order;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class OrderController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    #[Route('/orders/{id}', name: 'app_order_stats')]
    public function getOrder(int $id): JsonResponse
    {
        $order = $this->entityManager->getRepository(Order::class)->find($id);

        if (!$order) {
            throw new NotFoundHttpException("Order not found.");
        }

        return new JsonResponse([
            'id' => $order->getId(),
            'date' => $order->getDate()->format('Y-m-d'),
            'status' => $order->getStatus(),
            'total' => $order->getTotal()
        ]);
    }
}
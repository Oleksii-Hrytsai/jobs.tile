<?php

namespace App\Service;

use App\Entity\Order;
use Doctrine\ORM\EntityManagerInterface;

class OrderService
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function createOrder($data): Order
    {
        $order = new Order();
        $order->setOrderDate(new \DateTime($data['orderDate']));
        $order->setTotal($data['total']);
        $order->setStatus($data['status']);

        $this->entityManager->persist($order);
        $this->entityManager->flush();

        return $order;
    }
}

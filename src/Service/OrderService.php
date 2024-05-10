<?php

namespace App\Service;

use App\Entity\Orders;
use Doctrine\ORM\EntityManagerInterface;

class OrderService
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getOrder(int $id): ?Orders
    {
        return $this->entityManager->getRepository(Orders::class)->find($id);
    }

    public function addOrder(Orders $order): Orders
    {
        $this->entityManager->persist($order);
        $this->entityManager->flush();
        return $order;
    }

    public function updateOrder(Orders $order): Orders
    {
        $this->entityManager->flush();
        return $order;
    }

    public function deleteOrder(int $id): bool
    {
        $order = $this->entityManager->getRepository(Orders::class)->find($id);
        if ($order) {
            $this->entityManager->remove($order);
            $this->entityManager->flush();
            return true;
        }
        return false;
    }
}

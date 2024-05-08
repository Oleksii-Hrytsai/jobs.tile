<?php

use PHPUnit\Framework\TestCase;
use App\Service\OrderService;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Order;

class SoapServiceTest extends TestCase
{
    private $entityManager;
    private $orderService;

    protected function setUp(): void
    {
        $this->entityManager = $this->createMock(EntityManagerInterface::class);
        $this->orderService = new OrderService($this->entityManager);
    }

    public function testCreateOrder()
    {
        $data = ['orderDate' => 'now', 'total' => 100, 'status' => 'new'];

        $this->entityManager->expects($this->once())
            ->method('persist')
            ->with($this->isInstanceOf(Order::class));

        $this->entityManager->expects($this->once())
            ->method('flush');

        $result = $this->orderService->createOrder($data);
        $this->assertInstanceOf(Order::class, $result);
        $this->assertEquals('new', $result->getStatus());
    }
}

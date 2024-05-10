<?php

namespace App\Tests\Controllers;

use App\Repository\OrderRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class OrderStatsControllerTest extends WebTestCase
{
    public function testGetOrderStatistics(): void
    {
        $client = static::createClient();

        $orderRepository = $this->createMock(OrderRepository::class);
        $orderRepository->expects($this->once())
            ->method('getOrderStatistics')
            ->willReturn([
                ['groupValue' => '2024-5', 'count' => 2],
                ['groupValue' => '2024-4', 'count' => 17],
                ['groupValue' => '2024-3', 'count' => 15],
                ['groupValue' => '2024-2', 'count' => 14],
                ['groupValue' => '2024-1', 'count' => 22]
            ]);

        $orderRepository->expects($this->once())
            ->method('countOrders')
            ->willReturn(5);

        $client->getContainer()->set(OrderRepository::class, $orderRepository);

        $client->request('GET', '/orders/stats?page=1&limit=10&groupBy=month');

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        $this->assertJson($client->getResponse()->getContent());
        $responseData = json_decode($client->getResponse()->getContent(), true);

        $this->assertArrayHasKey('page', $responseData);
        $this->assertArrayHasKey('limit', $responseData);
        $this->assertArrayHasKey('total_pages', $responseData);
        $this->assertArrayHasKey('data', $responseData);
        $this->assertCount(5, $responseData['data']);
    }
}

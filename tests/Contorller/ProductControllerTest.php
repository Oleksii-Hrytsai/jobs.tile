<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

class ProductControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();
        $httpClientMock = $this->createMock(HttpClientInterface::class);
        $responseMock = $this->createMock(ResponseInterface::class);

        $httpClientMock->method('request')
            ->willReturn($responseMock);
        $responseMock->method('getContent')
            ->willReturn('<div class="price-per-measure-container">123€/m²</div>');

        $client->getContainer()->set(HttpClientInterface::class, $httpClientMock);

        $crawler = $client->request('GET', '/product?factory=cobsa&collection=manual&article=manu7530bcbm-manualbaltic7-5x30');

        $this->assertResponseIsSuccessful();
        $this->assertJson($client->getResponse()->getContent());
        $expectedJson = json_encode([
            'price' => '123',
            'factory' => 'cobsa',
            'collection' => 'manual',
            'article' => 'manu7530bcbm-manualbaltic7-5x30'
        ]);

        $this->assertJsonStringEqualsJsonString($expectedJson, $client->getResponse()->getContent());
    }
}

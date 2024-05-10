<?php

namespace App\Tests\Controllers;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;
use App\Service\SphinxService;

class SearchControllerTest extends WebTestCase
{
    public function testSearchWithId()
    {
        $sphinxServiceMock = $this->createMock(SphinxService::class);
        $sphinxServiceMock->method('fetchConditionFromIndex')
            ->willReturn([
                ['id' => 1, 'name' => 'Test Order']
            ]);

        $client = static::createClient();
        $client->getContainer()->set(SphinxService::class, $sphinxServiceMock);

        $client->request('GET', '/search?id=1');

        $response = $client->getResponse();
        $this->assertEquals(Response::HTTP_OK, $response->getStatusCode());
        $this->assertJson($response->getContent());
        $this->assertSame(json_encode([['id' => 1, 'name' => 'Test Order']]), $response->getContent());
    }
}
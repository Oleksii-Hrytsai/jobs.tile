<?php

namespace App\Tests\Controllers;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SoapControllerTest extends WebTestCase
{
    public function testWsdl()
    {
        $client = static::createClient();
        $client->request('GET', '/soap/wsdl');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals('application/wsdl+xml', $client->getResponse()->headers->get('Content-Type'));
    }
}

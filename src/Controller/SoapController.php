<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\OrderService;
use Zend\Soap\AutoDiscover;
use Zend\Soap\Server;

class SoapController extends AbstractController
{
    private OrderService $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    #[Route('/soap/wsdl', name: 'soap_wsdl')]
    public function wsdl()
    {
        $autodiscover = new AutoDiscover();
        $autodiscover->setClass(OrderService::class)
            ->setUri($this->generateUrl('soap_server', [], true));
        $wsdl = $autodiscover->generate();

        $response = new Response($wsdl->toXml());
        $response->headers->set('Content-Type', 'application/wsdl+xml');
        return $response;
    }

    #[Route('/soap/server', name: 'soap_server')]
    public function server()
    {
        $server = new Server($this->generateUrl('soap_wsdl', [], true));
        $server->setObject($this->orderService);
        $response = new Response();
        $response->headers->set('Content-Type', 'application/soap+xml; charset=utf-8');
        ob_start();
        $server->handle();
        $response->setContent(ob_get_clean());
        return $response;
    }
}

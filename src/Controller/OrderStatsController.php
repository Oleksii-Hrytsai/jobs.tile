<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class OrderStatsController extends AbstractController
{
    #[Route('/order/stats', name: 'app_order_stats')]
    public function index(): Response
    {
        return $this->render('order_stats/index.html.twig', [
            'controller_name' => 'OrderStatsController',
        ]);
    }
}

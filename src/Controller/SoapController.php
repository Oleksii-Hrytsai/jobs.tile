<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SoapController extends AbstractController
{
    #[Route('/soap', name: 'app_soap')]
    public function index(): Response
    {
        return $this->render('soap/index.html.twig', [
            'controller_name' => 'SoapController',
        ]);
    }
}

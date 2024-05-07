<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Component\DomCrawler\Crawler;
class ProductController extends AbstractController
{
    private HttpClientInterface $httpClient;

    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }
    #[Route('/product', name: 'app_product')]
    public function index(Request $request): JsonResponse
    {
        $factory = $request->query->get('factory');
        $collection = $request->query->get('collection');
        $article = $request->query->get('article');

        $url = "https://tile.expert/fr/tile/{$factory}/{$collection}/a/{$article}";
        $response = $this->httpClient->request('GET', $url);
        $crawler = new Crawler($response->getContent());
        $price = $crawler->filter('.price-per-measure-container')->text();

        $cleanPrice = preg_replace('/[\s\x{20AC}\/m\x{00B2}]+/u', '', $price);

        return new JsonResponse([
            'price' => $cleanPrice,
            'factory' => $factory,
            'collection' => $collection,
            'article' => $article
        ]);
    }
}

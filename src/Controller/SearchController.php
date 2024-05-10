<?php

namespace App\Controller;

use App\Service\SphinxService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpKernel\Exception\HttpException;

class SearchController extends AbstractController
{
    #[Route('/search', methods: ['GET'])]
    public function search(Request $request, SphinxService $sphinxService): JsonResponse
    {
        $params = [];

        $id = $request->query->getDigits('id');

        if ($id) {
            $params['id'] = (int)$id;
        }

        $query = $sphinxService->fetchConditionFromIndex('idxOrders', $params);
        try {
            return $this->json($query);
        } catch (\Exception $e) {
            $this->get('logger')->error("Search failed: " . $e->getMessage());
            throw new HttpException(500, "Internal Server Error");
        }
    }
}

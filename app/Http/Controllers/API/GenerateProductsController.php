<?php

namespace App\Http\Controllers\API;

use App\Services\FakerService;
use App\Http\Controllers\Controller;
use App\Repositories\ProductRepository;

/**
 * Class GenerateProductsController
 *
 * @package App\Http\Controllers\API
 */
class GenerateProductsController extends Controller
{
    /**
     * @param FakerService $fakerService
     * @param ProductRepository $productRepository
     * @param int $amount
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(FakerService $fakerService, ProductRepository $productRepository, $amount = 20)
    {
        if ($productRepository->first()) {
            return $this->json([], 'Products already generated...', 400);
        }

        $generatedProducts = [];

        for ($i = 0; $i < $amount; $i++) {
            $generatedProducts[] = $productRepository->create([
                'name' => $fakerService->text(10),
                'price' => $fakerService->price(50, 150)
            ]);
        }

        return $this->json($generatedProducts, 'Products successfully generated', 201);
    }
}

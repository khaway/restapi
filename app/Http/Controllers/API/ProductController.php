<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Repositories\ProductRepository;

/**
 * Class ProductController
 *
 * @package App\Http\Controllers\API
 */
class ProductController extends Controller
{
    /**
     * Product repository.
     *
     * @var ProductRepository
     */
    protected $productRepository;

    /**
     * ProductController constructor.
     *
     * @param ProductRepository $productRepository
     */
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * Get all of the balancers for the given project.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return $this->json($this->productRepository->all());
    }
}

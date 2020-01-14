<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\OrderRepository;
use App\Repositories\ProductRepository;

/**
 * Class OrderController
 *
 * @package App\Http\Controllers\API
 */
class OrderController extends Controller
{
    /**
     * Order repository.
     *
     * @var OrderRepository
     */
    protected $orderRepository;

    /**
     * Product repository.
     *
     * @var ProductRepository
     */
    protected $productRepository;

    /**
     * OrderController constructor.
     *
     * @param OrderRepository $orderRepository
     * @param ProductRepository $productRepository
     */
    public function __construct(OrderRepository $orderRepository, ProductRepository $productRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->productRepository = $productRepository;
    }

    /**
     * Get all of the balancers for the given project.
     *
     * @return Response
     */
    public function index()
    {
        return $this->json($this->orderRepository->all());
    }

    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $productIds = $request->product_ids;

        if (! $productIds || ! $this->productRepository->exists($productIds)) {
            return $this->json(null, "Invalid product id's.", 400);
        }

        $order = $this->orderRepository->create([
            // In real app, we can use code something like this
            // $order->user()->associate($currentUserId)
            'user_id' => 1
        ]);

        $order->products()->attach($productIds);

        return $this->json($order->id, 'New order created.', 201);
    }
}

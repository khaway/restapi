<?php

namespace App\Http\Controllers\API;

use GuzzleHttp\Client;
use App\Entities\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\OrderRepository;

/**
 * Class OrderPaymentController
 *
 * @package App\Http\Controllers\API
 */
class OrderPaymentController extends Controller
{
    /**
     * @param Request $request
     * @param OrderRepository $orderRepository
     * @param Client $httpClient
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request, OrderRepository $orderRepository, Client $httpClient)
    {
        $orderId = $request->order_id;
        $amount = $request->amount;

        if (! $orderId || ! $amount) {
            return $this->json(compact('orderId', 'amount'), 'Order id and amount are required params.', 400);
        }

        $order = $orderRepository->find($orderId);

        if ($order->amount() != $amount || $order->status != Order::STATUS_NEW) {
            return $this->json(
                compact('order', 'orderId', 'amount'),
                'Order status invalid or given amount not equals to order amount.',
                400
            );
        }

        $response = $httpClient->get('https://ya.ru');

        if ($response->getStatusCode() != 200) {
            return $this->json(compact('response'), 'Invalid response from ya.ru', 400);
        }

        $order->status = Order::STATUS_PAID;

        return $this->json([
            'is_saved' => $order->save()
        ], 'Order successfully paid.', 201);
    }
}

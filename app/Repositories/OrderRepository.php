<?php

namespace App\Repositories;

use App\Entities\Order;
use App\Contracts\OrderRepository as OrderRepositoryContract;

/**
 * Class OrderRepository
 *
 * @package App\Repositories
 */
class OrderRepository implements OrderRepositoryContract
{
    /**
     * Get all orders.
     *
     * @return Order[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return Order::all();
    }

    /**
     * Create a new order.
     *
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        return Order::create($data);
    }

    /**
     * Update existing order.
     *
     * @param array $where
     * @param array $data
     * @return mixed
     */
    public function update(array $where, array $data)
    {
        return Order::where($where)->update($data);
    }

    /**
     * Delete existing order by id.
     *
     * @param $id
     * @return bool|null
     * @throws \Exception
     */
    public function delete($id)
    {
        return Order::delete($id);
    }

    /**
     * Get single order by id.
     *
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return Order::find($id);
    }

    /**
     * Check if order with given id exists.
     *
     * @param $id
     * @return mixed
     */
    public function exists($id)
    {
        return Order::whereIn('id', array_wrap($id))->exists();
    }
}

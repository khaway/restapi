<?php

namespace App\Repositories;

use App\Entities\Product;
use App\Contracts\ProductRepository as ProductRepositoryContract;

/**
 * Class ProductRepository
 *
 * @package App\Repositories
 */
class ProductRepository implements ProductRepositoryContract
{
    /**
     * Get all products.
     *
     * @return Product[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return Product::all();
    }

    /**
     * Create a new product.
     *
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        return Product::create($data);
    }

    /**
     * Update existing product.
     *
     * @param array $where
     * @param array $data
     * @return mixed
     */
    public function update(array $where, array $data)
    {
        return Product::where($where)->update($data);
    }

    /**
     * Delete existing product by id.
     *
     * @param $id
     * @return bool|null
     * @throws \Exception
     */
    public function delete($id)
    {
        return Product::delete($id);
    }

    /**
     * Get single product by id.
     *
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return Product::find($id);
    }

    /**
     * Get first product.
     *
     * @return mixed
     */
    public function first()
    {
        return Product::first();
    }

    /**
     * Check if product with given id exists.
     *
     * @param $id
     * @return mixed
     */
    public function exists($id)
    {
        return Product::whereIn('id', array_wrap($id))->exists();
    }
}

<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 *
 * @package App\Entities
 */
class Order extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'status'];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['amount'];

    /**
     * New order status.
     *
     * @const string
     */
    public const STATUS_NEW = 'new';

    /**
     * Paid order status.
     *
     * @const string
     */
    public const STATUS_PAID = 'paid';

    /**
     * Get the products records associated with the order.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(
            Product::class,
            'order_product',
            'order_id',
            'product_id'
        );
    }

    /**
     * Get the order's amount.
     *
     * @return mixed
     */
    public function amount()
    {
        return $this->products()->select('price')->get()->sum(function ($product) {
            return $product->price;
        });
    }

    /**
     * Order's amount mutator.
     *
     * @return mixed
     */
    public function getAmountAttribute()
    {
        return $this->amount();
    }
}

<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 *
 * @package App\Entities
 */
class Product extends Model
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
    protected $fillable = ['name', 'price'];
}

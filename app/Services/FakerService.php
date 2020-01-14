<?php

namespace App\Services;

use Liior\Faker\Prices;
use Faker\Provider\Lorem;
use Faker\Generator as FakerGenerator;

/**
 * Class FakerService
 *
 * @package App\Services
 */
class FakerService
{
    /**
     * Faker generator.
     *
     * @var FakerGenerator
     */
    protected $fakerGenerator;

    /**
     * FakerService constructor.
     *
     * @param FakerGenerator $fakerGenerator
     */
    public function __construct(FakerGenerator $fakerGenerator)
    {
        $fakerGenerator->addProvider(new Prices($fakerGenerator));
        $fakerGenerator->addProvider(new Lorem($fakerGenerator));

        $this->fakerGenerator = $fakerGenerator;
    }

    /**
     * Generate random price.
     *
     * @param int $min
     * @param int $max
     * @return mixed
     */
    public function price($min = 1, $max = 9999)
    {
        return $this->fakerGenerator->price($min, $max);
    }

    /**
     * Generate random text with given length.
     *
     * @param int $length
     * @return string
     */
    public function text($length = 3)
    {
        return $this->fakerGenerator->text($length);
    }
}

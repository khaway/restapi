<?php

namespace App\Http\Controllers;

/**
 * Class FallbackController
 *
 * @package App\Http\Controllers
 */
class FallbackController extends Controller
{
    /**
     * @return string
     */
    public function __invoke()
    {
        return 'Not found.';
    }
}

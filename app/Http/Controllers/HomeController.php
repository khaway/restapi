<?php

namespace App\Http\Controllers;

/**
 * Class HomeController
 *
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * @return false|string
     */
    public function __invoke()
    {
        return file_get_contents(__DIR__.'/../../../public/app.html');
    }
}

<?php

namespace App\Support;

/**
 * Trait ReturnsJson
 *
 * @package App\Support
 */
trait ReturnsJson
{
    /**
     * Return a new json response from the application.
     *
     * @param array $data
     * @param null $message
     * @param int $status
     * @param array $headers
     * @param int $options
     * @return JsonResponse
     */
    public function json($data = [], $message = null, $status = 200, array $headers = [], $options = 0)
    {
        return json_response($data, $message, $status, $headers, $options);
    }
}

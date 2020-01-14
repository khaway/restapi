<?php

use Illuminate\Http\JsonResponse;
use Illuminate\Container\Container;

if (! function_exists('json_response')) {
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
    function json_response($data = [], $message = null, $status = 200, array $headers = [], $options = 0)
    {
        return new JsonResponse(compact('data', 'status', 'message'), $status, $headers, $options);
    }
}

if (! function_exists('app')) {
    /**
     * Get the available container instance.
     *
     * @param string|null $abstract
     * @param array $parameters
     * @return mixed|\Illuminate\Contracts\Foundation\Application
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    function app($abstract = null, array $parameters = [])
    {
        if (is_null($abstract)) {
            return Container::getInstance();
        }

        return Container::getInstance()->make($abstract, $parameters);
    }
}

if (! function_exists('array_wrap')) {
    /**
     * If the given value is not an array and not null, wrap it in one.
     *
     * @param mixed $value
     * @return array
     */
    function array_wrap($value)
    {
        if (is_null($value)) {
            return [];
        }

        return is_array($value) ? $value : [$value];
    }
}

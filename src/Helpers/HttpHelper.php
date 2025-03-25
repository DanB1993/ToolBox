<?php

namespace DanBaker\ToolBox\Helpers;

class HttpHelper
{
    /**
     * Redirect to a given URL and terminate execution.
     *
     * @param string $url
     * @param int $statusCode
     * @return void
     */
    public static function redirect(string $url, int $statusCode = 302): void
    {
        header('Location: ' . $url, true, $statusCode);
        exit;
    }

    /**
     * Return a JSON response and terminate execution.
     *
     * @param mixed $data
     * @param int $statusCode
     * @return void
     */
    public static function responseJson(mixed $data, int $statusCode = 200): void
    {
        header('Content-Type: application/json', true, $statusCode);
        echo json_encode($data);
        exit;
    }
}
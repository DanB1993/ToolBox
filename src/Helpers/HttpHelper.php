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

    /**
     * Get JSON-decoded input from the request body.
     *
     * @param bool $assoc Return as associative array if true.
     * @return mixed|null
     */
    public static function getJsonInput(bool $assoc = true): mixed
    {
        $raw = file_get_contents('php://input');

        if (empty($raw)) {
            return null;
        }

        $decoded = json_decode($raw, $assoc);

        return json_last_error() === JSON_ERROR_NONE ? $decoded : null;
    }
}
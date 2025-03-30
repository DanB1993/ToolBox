<?php

namespace DanBaker\ToolBox\Traits\HTTP;

trait GetJsonInput
{
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
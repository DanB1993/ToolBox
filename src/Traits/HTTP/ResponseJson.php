<?php

namespace DanBaker\ToolBox\Traits\HTTP;

trait ResponseJson
{
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
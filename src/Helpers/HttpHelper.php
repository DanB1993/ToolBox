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
}
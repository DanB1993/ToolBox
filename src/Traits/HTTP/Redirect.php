<?php

namespace DanBaker\ToolBox\Traits\HTTP;

trait Redirect
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
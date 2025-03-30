<?php

namespace DanBaker\ToolBox\Traits\HTTP;

trait Redirect
{
    /**
     * Redirect to a given URL and terminate execution.
     *
     * @param string $url The destination URL.
     * @param int $statusCode The HTTP status code to use.
     * @param bool $exit Whether to terminate the script after redirection.
     * @return void
     */
    public static function redirect(string $url, int $statusCode = 302, bool $exit = true): void
    {
        if (!filter_var($url, FILTER_VALIDATE_URL) && !str_starts_with($url, '/')) {
            throw new \InvalidArgumentException("Invalid URL provided: $url");
        }

        // Prevent header injection attacks
        $sanitisedUrl = str_replace(["\r", "\n"], '', $url);

        header('Location: ' . $sanitisedUrl, true, $statusCode);

        if ($exit) {
            exit;
        }
    }
}
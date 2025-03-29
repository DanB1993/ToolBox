<?php

namespace DanBaker\ToolBox\Helpers;

class FilesystemHelper
{
    /**
     * Check if a file path is absolute.
     *
     * @param string $path
     * @return bool
     */
    public static function isAbsolutePath(string $path): bool
    {
        if ($path === '') {
            return false;
        }

        // Unix: starts with /
        if ($path[0] === '/') {
            return true;
        }

        // Windows: starts with drive letter and colon (e.g., C:\)
        if (preg_match('/^[a-zA-Z]:[\/\\\\]/', $path)) {
            return true;
        }

        // Windows UNC paths: starts with \\server\share
        if (str_starts_with($path, '\\\\')) {
            return true;
        }

        return false;
    }

    /**
     * Normalize a file path by resolving ., .., and cleaning up slashes.
     *
     * @param string $path
     * @return string
     */
    public static function normalizePath(string $path): string
    {
        $path = str_replace('\\', '/', $path);

        $prefix = '';
        $normalized = '';

        // Windows drive letter (e.g. C:/)
        if (preg_match('/^([a-zA-Z]:)(\/|\\\)?/', $path, $matches)) {
            $prefix = $matches[1];
            $path = substr($path, strlen($matches[0]));
        } elseif (str_starts_with($path, '/')) {
            $prefix = '/';
            $path = ltrim($path, '/');
        }

        $segments = [];
        foreach (explode('/', $path) as $segment) {
            if ($segment === '' || $segment === '.') {
                continue;
            }
            if ($segment === '..') {
                array_pop($segments);
            } else {
                $segments[] = $segment;
            }
        }

        $normalized = implode('/', $segments);

        return $prefix !== '' ? rtrim($prefix, '/') . '/' . $normalized : $normalized;
    }
}
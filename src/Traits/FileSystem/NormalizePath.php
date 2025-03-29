<?php

namespace DanBaker\ToolBox\Traits\FileSystem;

trait NormalizePath
{
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
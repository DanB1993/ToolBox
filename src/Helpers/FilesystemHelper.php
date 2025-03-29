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

    /**
     * List all files in a directory.
     *
     * @param string $directory
     * @param bool $recursive
     * @return array
     */
    public static function listFiles(string $directory, bool $recursive = false): array
    {
        if (!is_dir($directory)) {
            return [];
        }

        $files = [];

        if ($recursive) {
            $iterator = new \RecursiveIteratorIterator(
                new \RecursiveDirectoryIterator($directory, \FilesystemIterator::SKIP_DOTS)
            );
        } else {
            $iterator = new \FilesystemIterator($directory, \FilesystemIterator::SKIP_DOTS);
        }

        foreach ($iterator as $file) {
            if ($file->isFile()) {
                $files[] = $file->getPathname();
            }
        }

        return $files;
    }

    /**
     * Recursively delete a directory and all its contents.
     *
     * @param string $directory
     * @return bool
     */
    public static function deleteDirectory(string $directory): bool
    {
        if (!is_dir($directory)) {
            return false;
        }

        $items = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($directory, \FilesystemIterator::SKIP_DOTS),
            \RecursiveIteratorIterator::CHILD_FIRST
        );

        foreach ($items as $item) {
            if ($item->isDir()) {
                rmdir($item->getPathname());
            } else {
                unlink($item->getPathname());
            }
        }

        return rmdir($directory);
    }
}
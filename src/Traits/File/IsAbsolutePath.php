<?php

namespace DanBaker\ToolBox\Traits\File;

trait IsAbsolutePath
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
}
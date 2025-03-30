<?php

namespace DanBaker\ToolBox\Traits\FileSystem;

trait ListFiles
{
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
}
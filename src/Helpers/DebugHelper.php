<?php

namespace DanBaker\ToolBox\Helpers;

class DebugHelper
{
    /**
     * Get current memory usage.
     *
     * @param bool $formatted
     * @return string|int
     */
    public static function memoryUsage(bool $formatted = true): string|int
    {
        $bytes = memory_get_usage(true);

        if (!$formatted) {
            return $bytes;
        }

        return self::formatBytes($bytes);
    }

    /**
     * Format bytes to human-readable string.
     *
     * @param int $bytes
     * @return string
     */
    protected static function formatBytes(int $bytes): string
    {
        if ($bytes < 1024) {
            return $bytes . ' B';
        }

        $units = ['B', 'KB', 'MB', 'GB', 'TB', 'PB'];
        $factor = (int) floor(log($bytes, 1024));

        return sprintf('%.2f %s', $bytes / (1024 ** $factor), $units[$factor]);
    }
}
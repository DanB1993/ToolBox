<?php

namespace DanBaker\ToolBox\Traits\Debug;

trait GetMemoryUsage
{
    /**
     * Get current memory usage.
     *
     * @param bool $formatted Whether to return a formatted string or raw bytes.
     * @param bool $realUsage Whether to get the real size of memory allocated (default: true).
     *                        Pass false to get actual memory used by scripts.
     * @return string|int Formatted memory string (e.g. "1.2 MB") or raw bytes as integer.
     */
    public static function getMemoryUsage(bool $formatted = true, bool $realUsage = true): string|int
    {
        $bytes = max(0, memory_get_usage($realUsage));

        return $formatted ? self::formatBytes($bytes) : $bytes;
    }
}
<?php

namespace DanBaker\ToolBox\Helpers;

class DebugHelper
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

    /**
     * Measure execution time of a callable in milliseconds.
     *
     * @param callable $callback
     * @return float Execution time in milliseconds.
     */
    public static function executionTime(callable $callback): float
    {
        $startTime = microtime(true);

        $callback();

        $endTime = microtime(true);

        return round(($endTime - $startTime) * 1000, 4);
    }

    /**
     * Dump the variable content and terminate execution.
     *
     * @param mixed ...$variables
     * @return void
     */
    public static function dd(mixed ...$variables): void
    {
        foreach ($variables as $variable) {
            var_dump($variable);
        }

        exit(1);
    }

    /**
     * Append a message to a log file with a timestamp.
     *
     * @param mixed  $message
     * @param string $filepath
     * @return void
     */
    public static function logToFile(mixed $message, string $filepath = '/tmp/toolbox.log'): void
    {
        $timestamp = date('Y-m-d H:i:s');
        $logEntry = sprintf("[%s] %s%s", $timestamp, print_r($message, true), PHP_EOL);

        file_put_contents($filepath, $logEntry, FILE_APPEND | LOCK_EX);
    }
}
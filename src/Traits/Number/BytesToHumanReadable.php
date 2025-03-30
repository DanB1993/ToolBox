<?php

namespace DanBaker\ToolBox\Traits\Number;

trait BytesToHumanReadable
{
    /**
     * Convert bytes into a human-readable format.
     *
     * @param int $bytes
     * @param int $precision
     * @return string
     */
    public static function bytesToHumanReadable(int $bytes, int $precision = 2): string
    {
        if ($bytes < 1024) {
            return $bytes . ' B';
        }

        $units = ['B', 'KB', 'MB', 'GB', 'TB', 'PB'];
        $factor = (int) floor(log($bytes, 1024));

        return sprintf("%.{$precision}f %s", $bytes / (1024 ** $factor), $units[$factor]);
    }
}
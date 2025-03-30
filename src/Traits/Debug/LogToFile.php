<?php

namespace DanBaker\ToolBox\Traits\Debug;

trait LogToFile
{
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
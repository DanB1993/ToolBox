<?php

namespace DanBaker\ToolBox\Traits\String;

trait RandomString
{
    /**
     * Generate a secure random string of a given length.
     *
     * @param int $length
     * @param string $characters
     * @return string
     */
    public static function randomString(int $length = 16, string $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'): string
    {
        $result = '';
        $maxIndex = strlen($characters) - 1;

        for ($i = 0; $i < $length; $i++) {
            $index = random_int(0, $maxIndex);
            $result .= $characters[$index];
        }

        return $result;
    }
}
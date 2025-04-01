<?php

namespace DanBaker\ToolBox\Traits\Utility;

trait GeneratePassword
{
    /**
     * Generate a random password based on provided options.
     *
     * @param int  $length
     * @param bool $includeSymbols
     * @param bool $includeNumbers
     * @param bool $includeUppercase
     * @param bool $includeLowercase
     * @return string
     */
    public static function generatePassword(
        int $length = 12,
        bool $includeSymbols = true,
        bool $includeNumbers = true,
        bool $includeUppercase = true,
        bool $includeLowercase = true
    ): string {
        $symbols    = '!@#$%^&*()_+-=[]{}|;:,.<>?';
        $numbers    = '0123456789';
        $uppercase  = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $lowercase  = 'abcdefghijklmnopqrstuvwxyz';

        $pool = '';
        $mandatory = [];

        if ($includeSymbols) {
            $pool .= $symbols;
            $mandatory[] = $symbols[random_int(0, strlen($symbols) - 1)];
        }

        if ($includeNumbers) {
            $pool .= $numbers;
            $mandatory[] = $numbers[random_int(0, strlen($numbers) - 1)];
        }

        if ($includeUppercase) {
            $pool .= $uppercase;
            $mandatory[] = $uppercase[random_int(0, strlen($uppercase) - 1)];
        }

        if ($includeLowercase) {
            $pool .= $lowercase;
            $mandatory[] = $lowercase[random_int(0, strlen($lowercase) - 1)];
        }

        if (empty($pool)) {
            throw new \InvalidArgumentException('At least one character type must be selected.');
        }

        $remainingLength = $length - count($mandatory);
        $password = $mandatory;

        for ($i = 0; $i < $remainingLength; $i++) {
            $password[] = $pool[random_int(0, strlen($pool) - 1)];
        }

        shuffle($password);

        return implode('', $password);
    }
}
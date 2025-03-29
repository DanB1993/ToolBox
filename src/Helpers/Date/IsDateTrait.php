<?php

namespace DanBaker\ToolBox\Helpers\Date;

trait IsDateTrait
{
    /**
     * Check if a value is a valid date or DateTime object.
     *
     * @param mixed $value
     * @return bool
     */
    public static function isDate(mixed $value): bool
    {
        if ($value instanceof \DateTimeInterface) {
            return true;
        }

        if (!is_string($value) || trim($value) === '') {
            return false;
        }

        try {
            new \DateTimeImmutable($value);
            return true;
        } catch (\Exception) {
            return false;
        }
    }
}
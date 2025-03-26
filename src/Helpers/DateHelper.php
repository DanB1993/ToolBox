<?php

namespace DanBaker\ToolBox\Helpers;

class DateHelper
{
    /**
     * Get the previous weekday (Monday–Friday) before a given date.
     *
     * @param \DateTimeInterface|string|null $date
     * @return \DateTimeImmutable
     */
    public static function previousWeekday(\DateTimeInterface|string|null $date = null): \DateTimeImmutable
    {
        $date = $date instanceof \DateTimeInterface
            ? \DateTimeImmutable::createFromInterface($date)
            : new \DateTimeImmutable($date ?? 'now');

        do {
            $date = $date->modify('-1 day');
        } while (in_array((int) $date->format('N'), [6, 7], true)); // 6 = Saturday, 7 = Sunday

        return $date;
    }

    /**
     * Get the next weekday (Monday–Friday) after a given date.
     *
     * @param \DateTimeInterface|string|null $date
     * @return \DateTimeImmutable
     */
    public static function nextWeekday(\DateTimeInterface|string|null $date = null): \DateTimeImmutable
    {
        $date = $date instanceof \DateTimeInterface
            ? \DateTimeImmutable::createFromInterface($date)
            : new \DateTimeImmutable($date ?? 'now');

        do {
            $date = $date->modify('+1 day');
        } while (in_array((int) $date->format('N'), [6, 7], true)); // 6 = Saturday, 7 = Sunday

        return $date;
    }

    /**
     * Check if a given date falls on a weekend (Saturday or Sunday).
     *
     * @param \DateTimeInterface|string|null $date
     * @return bool
     */
    public static function isWeekend(\DateTimeInterface|string|null $date = null): bool
    {
        $date = $date instanceof \DateTimeInterface
            ? $date
            : new \DateTimeImmutable($date ?? 'now');

        $dayOfWeek = (int) $date->format('N'); // 6 = Saturday, 7 = Sunday

        return $dayOfWeek >= 6;
    }
}
<?php

namespace DanBaker\ToolBox\Traits\Date;

trait IsWeekend
{
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
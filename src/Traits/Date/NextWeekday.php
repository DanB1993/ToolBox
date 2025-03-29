<?php

namespace DanBaker\ToolBox\Traits\Date;

trait NextWeekday
{
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
}
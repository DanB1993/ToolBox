<?php

namespace DanBaker\ToolBox\Traits\Date;

trait HumanReadableDiff
{
    /**
     * Get a human-readable difference between two dates.
     *
     * @param \DateTimeInterface|string $date
     * @param \DateTimeInterface|string|null $reference
     * @return string
     */
    public static function humanReadableDiff(
        \DateTimeInterface|string $date,
        \DateTimeInterface|string|null $reference = null
    ): string {
        $date = $date instanceof \DateTimeInterface
            ? $date
            : new \DateTimeImmutable($date);
    
        $reference = $reference instanceof \DateTimeInterface
            ? $reference
            : new \DateTimeImmutable($reference ?? 'now');
    
        $diff = $reference->diff($date);
    
        $units = [
            'y' => 'year',
            'm' => 'month',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        ];
    
        foreach ($units as $key => $label) {
            $value = $diff->$key;
            if ($value > 0) {
                $plural = $value === 1 ? '' : 's';
                $direction = $diff->invert ? 'ago' : "in";
                return $direction === 'ago'
                    ? "{$value} {$label}{$plural} ago"
                    : "in {$value} {$label}{$plural}";
            }
        }
    
        return 'just now';
    }
}
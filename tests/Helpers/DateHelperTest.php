<?php

namespace DanBaker\ToolBox\Tests\Helpers;

use DanBaker\ToolBox\Helpers\DateHelper;
use PHPUnit\Framework\TestCase;

class DateHelperTest extends TestCase
{
    /** @test */
    public function gets_previous_weekday_from_weekday()
    {
        $date = new \DateTimeImmutable('2025-03-25'); // Tuesday
        $previous = DateHelper::previousWeekday($date);

        $this->assertEquals('2025-03-24', $previous->format('Y-m-d')); // Monday
    }

    /** @test */
    public function skips_weekend_from_monday()
    {
        $date = new \DateTimeImmutable('2025-03-24'); // Monday
        $previous = DateHelper::previousWeekday($date);

        $this->assertEquals('2025-03-21', $previous->format('Y-m-d')); // Friday
    }

    /** @test */
    public function handles_string_input()
    {
        $previous = DateHelper::previousWeekday('2025-03-24');
        $this->assertEquals('2025-03-21', $previous->format('Y-m-d'));
    }

    /** @test */
    public function gets_next_weekday_from_weekday()
    {
        $date = new \DateTimeImmutable('2025-03-25'); // Tuesday
        $next = DateHelper::nextWeekday($date);

        $this->assertEquals('2025-03-26', $next->format('Y-m-d')); // Wednesday
    }

    /** @test */
    public function skips_weekend_from_friday()
    {
        $date = new \DateTimeImmutable('2025-03-21'); // Friday
        $next = DateHelper::nextWeekday($date);

        $this->assertEquals('2025-03-24', $next->format('Y-m-d')); // Monday
    }

    /** @test */
    public function handles_string_input_for_next_weekday()
    {
        $next = DateHelper::nextWeekday('2025-03-21');
        $this->assertEquals('2025-03-24', $next->format('Y-m-d'));
    }

    /** @test */
    public function correctly_identifies_weekends()
    {
        $this->assertTrue(DateHelper::isWeekend('2025-03-22')); // Saturday
        $this->assertTrue(DateHelper::isWeekend('2025-03-23')); // Sunday
        $this->assertFalse(DateHelper::isWeekend('2025-03-24')); // Monday
    }

    /** @test */
    public function returns_human_readable_difference_between_dates()
    {
        $now = new \DateTimeImmutable('2025-03-25 12:00:00');

        $this->assertEquals('2 days ago', DateHelper::humanReadableDiff('2025-03-23 12:00:00', $now));
        $this->assertEquals('in 3 hours', DateHelper::humanReadableDiff('2025-03-25 15:00:00', $now));
        $this->assertEquals('just now', DateHelper::humanReadableDiff($now, $now));
    }
}
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
}
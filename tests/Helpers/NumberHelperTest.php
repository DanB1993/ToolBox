<?php

namespace DanBaker\ToolBox\Tests\Helpers;

use DanBaker\ToolBox\Helpers\NumberHelper;
use PHPUnit\Framework\TestCase;

class NumberHelperTest extends TestCase
{
    /** @test */
    public function formats_currency_correctly()
    {
        $this->assertEquals('£1,000.00', NumberHelper::formatCurrency(1000));
        $this->assertEquals('$1,234.56', NumberHelper::formatCurrency(1234.56, '$'));
        $this->assertEquals('€1.234,56', NumberHelper::formatCurrency(1234.56, '€', 2, ',', '.'));
        $this->assertEquals('£1,235', NumberHelper::formatCurrency(1234.56, '£', 0));
    }

    /** @test */
    public function calculates_percentage_correctly()
    {
        $this->assertEquals(50.00, NumberHelper::percentage(50, 100));
        $this->assertEquals(33.33, NumberHelper::percentage(1, 3));
        $this->assertEquals(66.667, NumberHelper::percentage(2, 3, 3));
        $this->assertEquals(0.0, NumberHelper::percentage(50, 0)); // handle division by zero
    }
}
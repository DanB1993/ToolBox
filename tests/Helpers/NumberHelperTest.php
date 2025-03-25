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
}
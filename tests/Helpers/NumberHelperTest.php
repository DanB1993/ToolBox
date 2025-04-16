<?php

namespace DanBaker\ToolBox\Tests\Helpers;

use DanBaker\ToolBox\ToolBox;
use PHPUnit\Framework\TestCase;

class NumberHelperTest extends TestCase
{
    /** @test */
    public function formats_currency_correctly()
    {
        $this->assertEquals('£1,000.00', ToolBox::number()->formatCurrency(1000));
        $this->assertEquals('$1,234.56', ToolBox::number()->formatCurrency(1234.56, '$'));
        $this->assertEquals('€1.234,56', ToolBox::number()->formatCurrency(1234.56, '€', 2, ',', '.'));
        $this->assertEquals('£1,235', ToolBox::number()->formatCurrency(1234.56, '£', 0));
    }

    /** @test */
    public function calculates_percentage_correctly()
    {
        $this->assertEquals(50.00, ToolBox::number()->percentage(50, 100));
        $this->assertEquals(33.33, ToolBox::number()->percentage(1, 3));
        $this->assertEquals(66.667, ToolBox::number()->percentage(2, 3, 3));
        $this->assertEquals(0.0, ToolBox::number()->percentage(50, 0)); // handle division by zero
    }

    /** @test */
    public function converts_bytes_to_human_readable_format()
    {
        $this->assertEquals('512 B', ToolBox::number()->bytesToHumanReadable(512));
        $this->assertEquals('1.00 KB', ToolBox::number()->bytesToHumanReadable(1024));
        $this->assertEquals('1.50 MB', ToolBox::number()->bytesToHumanReadable(1572864));
        $this->assertEquals('1.00 GB', ToolBox::number()->bytesToHumanReadable(1073741824));
        $this->assertEquals('1.23 TB', ToolBox::number()->bytesToHumanReadable(1352399302164));
    }
}
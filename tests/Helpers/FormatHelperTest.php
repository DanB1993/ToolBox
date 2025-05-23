<?php

namespace DanBaker\ToolBox\Tests\Helpers;

use DanBaker\ToolBox\ToolBox;
use PHPUnit\Framework\TestCase;

class FormatHelperTest extends TestCase
{
    /** @test */
    public function format_phone_numbers()
    {
        $this->assertEquals('07123 456789', ToolBox::format()->phoneNumber('+447123456789'));
        $this->assertEquals('07123 456789', ToolBox::format()->phoneNumber('07123 456789'));
        $this->assertEquals('07123 456789', ToolBox::format()->phoneNumber('07123456789'));
        $this->assertEquals('02079460000', ToolBox::format()->phoneNumber('02079460000')); // fallback
    }
}
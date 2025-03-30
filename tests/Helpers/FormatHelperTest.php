<?php

namespace DanBaker\ToolBox\Tests\Helpers;

use DanBaker\ToolBox\Helpers\FormatHelper;
use PHPUnit\Framework\TestCase;

class FormatHelperTest extends TestCase
{
    /** @test */
    public function format_phone_numbers()
    {
        $this->assertEquals('07123 456789', FormatHelper::PhoneNumber('+447123456789'));
        $this->assertEquals('07123 456789', FormatHelper::PhoneNumber('07123 456789'));
        $this->assertEquals('07123 456789', FormatHelper::PhoneNumber('07123456789'));
        $this->assertEquals('02079460000', FormatHelper::PhoneNumber('02079460000')); // fallback
    }
}
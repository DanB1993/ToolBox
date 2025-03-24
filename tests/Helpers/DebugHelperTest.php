<?php

namespace DanBaker\ToolBox\Tests\Helpers;

use DanBaker\ToolBox\Helpers\DebugHelper;
use PHPUnit\Framework\TestCase;

class DebugHelperTest extends TestCase
{
    /** @test */
    public function returns_memory_usage_as_integer()
    {
        $usage = DebugHelper::memoryUsage(false);

        $this->assertIsInt($usage);
        $this->assertGreaterThan(0, $usage);
    }

    /** @test */
    public function returns_formatted_memory_usage_string()
    {
        $usage = DebugHelper::memoryUsage(true);

        $this->assertMatchesRegularExpression('/^\d+(\.\d{2})?\s(B|KB|MB|GB|TB|PB)$/', $usage);
    }

    /** @test */
    public function measures_callable_execution_time()
    {
        $executionTime = DebugHelper::executionTime(function () {
            usleep(100000); // 100 milliseconds
        });

        $this->assertIsFloat($executionTime);
        $this->assertGreaterThanOrEqual(100, $executionTime);
    }
}
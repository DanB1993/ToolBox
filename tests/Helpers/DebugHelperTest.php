<?php

namespace DanBaker\ToolBox\Tests\Helpers;

use DanBaker\ToolBox\Helpers\DebugHelper;
use PHPUnit\Framework\TestCase;

class DebugHelperTest extends TestCase
{
    /** @test */
    public function returns_memory_usage_as_integer()
    {
        $usage = DebugHelper::getMemoryUsage(false);

        $this->assertIsInt($usage);
        $this->assertGreaterThan(0, $usage);
    }

    /** @test */
    public function returns_formatted_memory_usage_string()
    {
        $usage = DebugHelper::getMemoryUsage(true);

        $this->assertMatchesRegularExpression('/^\d+(\.\d{2})?\s(B|KB|MB|GB|TB|PB)$/', $usage);
    }

    /** @test */
    public function returns_actual_memory_usage_as_integer()
    {
        $usage = DebugHelper::getMemoryUsage(false, false);

        $this->assertIsInt($usage);
        $this->assertGreaterThan(0, $usage);
    }

    /** @test */
    public function returns_actual_formatted_memory_usage_string()
    {
        $usage = DebugHelper::getMemoryUsage(true, false);

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

    /** @test */
    public function logs_message_to_file()
    {
        $logFile = sys_get_temp_dir() . '/test_toolbox.log';

        if (file_exists($logFile)) {
            unlink($logFile);
        }

        DebugHelper::logToFile('Test log entry', $logFile);

        $this->assertFileExists($logFile);

        $logContent = file_get_contents($logFile);
        $this->assertStringContainsString('Test log entry', $logContent);

        unlink($logFile);
    }
}
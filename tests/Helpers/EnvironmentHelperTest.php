<?php

namespace DanBaker\ToolBox\Tests\Helpers;

use DanBaker\ToolBox\Helpers\EnvironmentHelper;
use PHPUnit\Framework\TestCase;

class EnvironmentHelperTest extends TestCase
{
    /** @test */
    public function returns_env_value_or_default()
    {
        putenv('TOOLBOX_EXAMPLE=true');
        $this->assertTrue(EnvironmentHelper::getEnv('TOOLBOX_EXAMPLE'));

        putenv('TOOLBOX_EXAMPLE=(null)');
        $this->assertNull(EnvironmentHelper::getEnv('TOOLBOX_EXAMPLE'));

        putenv('TOOLBOX_EXAMPLE=(empty)');
        $this->assertSame('', EnvironmentHelper::getEnv('TOOLBOX_EXAMPLE'));

        putenv('TOOLBOX_MISSING'); // Unset
        $this->assertEquals('fallback', EnvironmentHelper::getEnv('TOOLBOX_MISSING', 'fallback'));
    }

    /** @test */
    public function detects_testing_environment_correctly()
    {
        putenv('APP_ENV=testing');
        $this->assertTrue(EnvironmentHelper::isTesting());

        putenv('APP_ENV=production');
        $this->assertFalse(EnvironmentHelper::isTesting());

        putenv('APP_ENV'); // reset
    }
    
    /** @test */
    public function detects_development_environment_correctly()
    {
        putenv('APP_ENV=development');
        $this->assertTrue(EnvironmentHelper::isDevelopment());

        putenv('APP_ENV=production');
        $this->assertFalse(EnvironmentHelper::isDevelopment());

        putenv('APP_ENV'); // reset
    }

    /** @test */
    public function detects_production_environment_correctly()
    {
        putenv('APP_ENV=production');
        $this->assertTrue(EnvironmentHelper::isProduction());

        putenv('APP_ENV=development');
        $this->assertFalse(EnvironmentHelper::isProduction());

        putenv('APP_ENV'); // reset
    }
}
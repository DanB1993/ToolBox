<?php

namespace DanBaker\ToolBox\Tests\Helpers;

use DanBaker\ToolBox\Helpers\FilesystemHelper;
use PHPUnit\Framework\TestCase;

class FilesystemHelperTest extends TestCase
{
    /** @test */
    public function detects_absolute_paths_correctly()
    {
        $this->assertTrue(FilesystemHelper::isAbsolutePath('/usr/local/bin'));         // Unix
        $this->assertTrue(FilesystemHelper::isAbsolutePath('C:\\Windows\\System32'));   // Windows
        $this->assertTrue(FilesystemHelper::isAbsolutePath('D:/Dev/Projects'));         // Windows alt slash
        $this->assertTrue(FilesystemHelper::isAbsolutePath('\\\\server\\share'));       // UNC path

        $this->assertFalse(FilesystemHelper::isAbsolutePath('relative/path/to/file'));
        $this->assertFalse(FilesystemHelper::isAbsolutePath('./file.txt'));
        $this->assertFalse(FilesystemHelper::isAbsolutePath(''));
    }
}
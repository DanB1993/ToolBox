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

    /** @test */
    public function normalizes_paths_correctly()
    {
        $this->assertEquals('folder/sub/file.txt', FilesystemHelper::normalizePath('folder//sub/./file.txt'));
        $this->assertEquals('folder/file.txt', FilesystemHelper::normalizePath('folder/sub/../file.txt'));
        $this->assertEquals('/var/www/html', FilesystemHelper::normalizePath('/var/./www/../www/html'));
        $this->assertEquals('C:/dev/project', FilesystemHelper::normalizePath('C:\\dev\\project\\.\\'));
        $this->assertEquals('relative/path', FilesystemHelper::normalizePath('./relative/path'));
    }

    /** @test */
    public function lists_files_in_directory_correctly()
    {
        $root = __DIR__ . '/temp_files';
        $sub = $root . '/nested';

        mkdir($root, 0777, true);
        mkdir($sub, 0777, true);
        file_put_contents("$root/a.txt", 'A');
        file_put_contents("$root/b.log", 'B');
        file_put_contents("$sub/c.txt", 'C');

        // Non-recursive
        $filesFlat = FilesystemHelper::listFiles($root);
        $this->assertIsArray($filesFlat);
        $this->assertCount(2, $filesFlat);
        $this->assertContains("$root/a.txt", $filesFlat);
        $this->assertContains("$root/b.log", $filesFlat);

        // Recursive
        $filesAll = FilesystemHelper::listFiles($root, true);
        $this->assertIsArray($filesAll);
        $this->assertCount(3, $filesAll);
        $this->assertContains("$sub/c.txt", $filesAll);

        // Cleanup after all assertions
        unlink("$root/a.txt");
        unlink("$root/b.log");
        unlink("$sub/c.txt");
        rmdir($sub);
        rmdir($root);
    }
}
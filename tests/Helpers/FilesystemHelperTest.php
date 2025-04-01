<?php

namespace DanBaker\ToolBox\Tests\Helpers;

use DanBaker\ToolBox\ToolBox;
use PHPUnit\Framework\TestCase;

class FilesystemHelperTest extends TestCase
{
    /** @test */
    public function detects_absolute_paths_correctly()
    {
        $this->assertTrue(ToolBox::file()->isAbsolutePath('/usr/local/bin'));         // Unix
        $this->assertTrue(ToolBox::file()->isAbsolutePath('C:\\Windows\\System32'));   // Windows
        $this->assertTrue(ToolBox::file()->isAbsolutePath('D:/Dev/Projects'));         // Windows alt slash
        $this->assertTrue(ToolBox::file()->isAbsolutePath('\\\\server\\share'));       // UNC path

        $this->assertFalse(ToolBox::file()->isAbsolutePath('relative/path/to/file'));
        $this->assertFalse(ToolBox::file()->isAbsolutePath('./file.txt'));
        $this->assertFalse(ToolBox::file()->isAbsolutePath(''));
    }

    /** @test */
    public function normalizes_paths_correctly()
    {
        $this->assertEquals('folder/sub/file.txt', ToolBox::file()->normalizePath('folder//sub/./file.txt'));
        $this->assertEquals('folder/file.txt', ToolBox::file()->normalizePath('folder/sub/../file.txt'));
        $this->assertEquals('/var/www/html', ToolBox::file()->normalizePath('/var/./www/../www/html'));
        $this->assertEquals('C:/dev/project', ToolBox::file()->normalizePath('C:\\dev\\project\\.\\'));
        $this->assertEquals('relative/path', ToolBox::file()->normalizePath('./relative/path'));
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
        $filesFlat = ToolBox::file()->listFiles($root);
        $this->assertIsArray($filesFlat);
        $this->assertCount(2, $filesFlat);
        $this->assertContains("$root/a.txt", $filesFlat);
        $this->assertContains("$root/b.log", $filesFlat);

        // Recursive
        $filesAll = ToolBox::file()->listFiles($root, true);
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

    /** @test */
    public function deletes_directory_and_contents()
    {
        $root = __DIR__ . '/delete_me';
        $nested = "$root/nested";

        mkdir($nested, 0777, true);
        file_put_contents("$root/file1.txt", 'file1');
        file_put_contents("$nested/file2.txt", 'file2');

        $this->assertDirectoryExists($root);
        $this->assertFileExists("$root/file1.txt");
        $this->assertFileExists("$nested/file2.txt");

        $deleted = ToolBox::file()->deleteDirectory($root);

        $this->assertTrue($deleted);
        $this->assertDirectoryDoesNotExist($root);
    }
}
<?php
/**
 * FileSystemHelper
 *
 * A collection of reusable filesystem-related helper methods using traits.
 * Includes helpers to delete directories, normalize paths, check absolute paths,
 * and list files within directories.
 *
 * @package     DanBaker\ToolBox
 * @author      Dan Baker
 * @license     MIT License
 * @link        https://github.com/danBaker/ToolBox
 */

namespace DanBaker\ToolBox\Helpers;

use DanBaker\ToolBox\Traits\FileSystem\DeleteDirectory;
use DanBaker\ToolBox\Traits\FileSystem\IsAbsolutePath;
use DanBaker\ToolBox\Traits\FileSystem\ListFiles;
use DanBaker\ToolBox\Traits\FileSystem\NormalizePath;

class FileSystemHelper
{
    use DeleteDirectory;
    use IsAbsolutePath;
    use ListFiles;
    use NormalizePath;
}
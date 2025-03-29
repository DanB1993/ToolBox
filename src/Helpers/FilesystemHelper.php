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

use DanBaker\ToolBox\Helpers\FileSystem\DeleteDirectoryTrait;
use DanBaker\ToolBox\Helpers\FileSystem\IsAbsolutePathTrait;
use DanBaker\ToolBox\Helpers\FileSystem\ListFilesTrait;
use DanBaker\ToolBox\Helpers\FileSystem\NormalizePathTrait;

class FileSystemHelper
{
    use DeleteDirectoryTrait;
    use IsAbsolutePathTrait;
    use ListFilesTrait;
    use NormalizePathTrait;
}
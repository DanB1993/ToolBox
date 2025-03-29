<?php
/**
 * DebugHelper
 *
 * A collection of reusable debug-related helper methods using traits.
 * Includes methods for dumping data, measuring execution time and memory usage,
 * formatting byte sizes, and logging debug output to file.
 *
 * @package     DanBaker\ToolBox
 * @author      Dan Baker
 * @license     MIT License
 * @link        https://github.com/danBaker/ToolBox
 */

namespace DanBaker\ToolBox\Helpers;

use DanBaker\ToolBox\Helpers\Debug\DdTrait;
use DanBaker\ToolBox\Helpers\Debug\ExecutionTimeTrait;
use DanBaker\ToolBox\Helpers\Debug\FormatBytesTrait;
use DanBaker\ToolBox\Helpers\Debug\GetMemoryUsageTrait;
use DanBaker\ToolBox\Helpers\Debug\LogToFileTrait;

class DebugHelper
{
    use DdTrait;
    use ExecutionTimeTrait;
    use FormatBytesTrait;
    use GetMemoryUsageTrait;
    use LogToFileTrait;
}
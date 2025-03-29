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

use DanBaker\ToolBox\Traits\Debug\Dd;
use DanBaker\ToolBox\Traits\Debug\ExecutionTime;
use DanBaker\ToolBox\Traits\Debug\FormatBytes;
use DanBaker\ToolBox\Traits\Debug\GetMemoryUsage;
use DanBaker\ToolBox\Traits\Debug\LogToFile;

class DebugHelper
{
    use Dd;
    use ExecutionTime;
    use FormatBytes;
    use GetMemoryUsage;
    use LogToFile;
}
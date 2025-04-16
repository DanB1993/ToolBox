<?php

namespace DanBaker\ToolBox\Services;

use DanBaker\ToolBox\Traits\Debug\Dd;
use DanBaker\ToolBox\Traits\Debug\ExecutionTime;
use DanBaker\ToolBox\Traits\Debug\FormatBytes;
use DanBaker\ToolBox\Traits\Debug\GetMemoryUsage;
use DanBaker\ToolBox\Traits\Debug\LogToFile;

class DebugTools
{
    use Dd;
    use ExecutionTime;
    use FormatBytes;
    use GetMemoryUsage;
    use LogToFile;
}
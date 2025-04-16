<?php

namespace DanBaker\ToolBox\Services;

use DanBaker\ToolBox\Traits\File\DeleteDirectory;
use DanBaker\ToolBox\Traits\File\IsAbsolutePath;
use DanBaker\ToolBox\Traits\File\ListFiles;
use DanBaker\ToolBox\Traits\File\NormalizePath;

class FileTools
{
    use DeleteDirectory;
    use IsAbsolutePath;
    use ListFiles;
    use NormalizePath;
}
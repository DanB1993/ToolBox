<?php

namespace DanBaker\ToolBox\Services;

use DanBaker\ToolBox\Traits\HTTP\GetJsonInput;
use DanBaker\ToolBox\Traits\HTTP\Redirect;
use DanBaker\ToolBox\Traits\HTTP\ResponseJson;

class HttpTools
{
    use GetJsonInput;
    use Redirect;
    use ResponseJson;
}
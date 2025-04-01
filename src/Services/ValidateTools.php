<?php

namespace DanBaker\ToolBox\Services;

use DanBaker\ToolBox\Traits\Validate\IsAlphaNumeric;
use DanBaker\ToolBox\Traits\Validate\IsJson;

class ValidateTools
{
    use IsAlphaNumeric;
    use IsJson;
}
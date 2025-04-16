<?php

namespace DanBaker\ToolBox\Services;

use DanBaker\ToolBox\Traits\Number\BytesToHumanReadable;
use DanBaker\ToolBox\Traits\Number\FormatCurrency;
use DanBaker\ToolBox\Traits\Number\Percentage;

class NumberTools
{
    use BytesToHumanReadable;
    use FormatCurrency;
    use Percentage;
}
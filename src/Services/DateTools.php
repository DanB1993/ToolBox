<?php

namespace DanBaker\ToolBox\Services;

use DanBaker\ToolBox\Traits\Date\HumanReadableDiff;
use DanBaker\ToolBox\Traits\Date\IsDate;
use DanBaker\ToolBox\Traits\Date\IsWeekend;
use DanBaker\ToolBox\Traits\Date\NextWeekday;
use DanBaker\ToolBox\Traits\Date\PreviousWeekday;

class DateTools
{
    use HumanReadableDiff;
    use IsDate;
    use IsWeekend;
    use NextWeekday;
    use PreviousWeekday;
}
<?php
/**
 * DateHelper
 *
 * A collection of reusable date-related helper methods using traits.
 * Includes methods to check date validity, determine weekends,
 * and find previous/next weekdays with human-readable diff formatting.
 *
 * @package     DanBaker\ToolBox
 * @author      Dan Baker
 * @license     MIT License
 * @link        https://github.com/danBaker/ToolBox
 */

namespace DanBaker\ToolBox\Helpers;

use DanBaker\ToolBox\Traits\Date\HumanReadableDiff;
use DanBaker\ToolBox\Traits\Date\IsDate;
use DanBaker\ToolBox\Traits\Date\IsWeekend;
use DanBaker\ToolBox\Traits\Date\NextWeekday;
use DanBaker\ToolBox\Traits\Date\PreviousWeekday;

class DateHelper
{
    use HumanReadableDiff;
    use IsDate;
    use IsWeekend;
    use NextWeekday;
    use PreviousWeekday;
}
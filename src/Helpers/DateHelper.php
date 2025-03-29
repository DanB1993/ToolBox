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

use DanBaker\ToolBox\Helpers\Date\HumanReadableDiffTrait;
use DanBaker\ToolBox\Helpers\Date\IsDateTrait;
use DanBaker\ToolBox\Helpers\Date\IsWeekendTrait;
use DanBaker\ToolBox\Helpers\Date\NextWeekdayTrait;
use DanBaker\ToolBox\Helpers\Date\PreviousWeekdayTrait;

class DateHelper
{
    use HumanReadableDiffTrait;
    use IsDateTrait;
    use IsWeekendTrait;
    use NextWeekdayTrait;
    use PreviousWeekdayTrait;
}
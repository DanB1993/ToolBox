<?php
/**
 * NumberHelper
 *
 * A collection of reusable number-related helper methods using traits.
 * Includes helpers to format bytes into human-readable strings, format currency,
 * and calculate percentages.
 *
 * @package     DanBaker\ToolBox
 * @author      Dan Baker
 * @license     MIT License
 * @link        https://github.com/danBaker/ToolBox
 */

namespace DanBaker\ToolBox\Helpers;

use DanBaker\ToolBox\Traits\Number\BytesToHumanReadable;
use DanBaker\ToolBox\Traits\Number\FormatCurrency;
use DanBaker\ToolBox\Traits\Number\Percentage;

class NumberHelper
{
    use BytesToHumanReadable;
    use FormatCurrency;
    use Percentage;
}
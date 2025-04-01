<?php
/**
 * FormatHelper
 *
 * A collection of reusable formatting-related helper methods using traits.
 * Currently includes formatting helpers for phone numbers.
 *
 * @package     DanBaker\ToolBox
 * @author      Dan Baker
 * @license     MIT License
 * @link        https://github.com/danBaker/ToolBox
 */

namespace DanBaker\ToolBox\Helpers;

use DanBaker\ToolBox\Traits\Format\PhoneNumber;

class FormatHelper
{
    use PhoneNumber;
}
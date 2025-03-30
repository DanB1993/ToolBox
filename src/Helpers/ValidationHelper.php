<?php
/**
 * ValidationHelper
 *
 * A collection of reusable validation-related helper methods using traits.
 * Includes helpers to check if strings are alphanumeric and validate JSON strings.
 *
 * @package     DanBaker\ToolBox
 * @author      Dan Baker
 * @license     MIT License
 * @link        https://github.com/danBaker/ToolBox
 */

namespace DanBaker\ToolBox\Helpers;

use DanBaker\ToolBox\Traits\Validation\IsAlphaNumeric;
use DanBaker\ToolBox\Traits\Validation\IsJson;

class ValidationHelper
{
    use IsAlphaNumeric;
    use IsJson;
}
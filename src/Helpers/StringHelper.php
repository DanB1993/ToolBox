<?php
/**
 * StringHelper
 *
 * A collection of reusable string-related helper methods using traits.
 * Includes helpers to convert strings between casing formats and truncate strings safely.
 *
 * @package     DanBaker\ToolBox
 * @author      Dan Baker
 * @license     MIT License
 * @link        https://github.com/danBaker/ToolBox
 */

namespace DanBaker\ToolBox\Helpers;

use DanBaker\ToolBox\Traits\String\ToCamelCase;
use DanBaker\ToolBox\Traits\String\ToKebabCase;
use DanBaker\ToolBox\Traits\String\ToSnakeCase;
use DanBaker\ToolBox\Traits\String\Truncate;

class StringHelper
{
    use ToCamelCase;
    use ToKebabCase;
    use ToSnakeCase;
    use Truncate;
}
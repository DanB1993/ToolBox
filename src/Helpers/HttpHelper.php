<?php
/**
 * HttpHelper
 *
 * A collection of reusable HTTP-related helper methods using traits.
 * Includes helpers to handle JSON input, return JSON responses, and perform redirects.
 *
 * @package     DanBaker\ToolBox
 * @author      Dan Baker
 * @license     MIT License
 * @link        https://github.com/danBaker/ToolBox
 */

namespace DanBaker\ToolBox\Helpers;

use DanBaker\ToolBox\Traits\HTTP\GetJsonInput;
use DanBaker\ToolBox\Traits\HTTP\Redirect;
use DanBaker\ToolBox\Traits\HTTP\ResponseJson;

class HttpHelper
{
    use GetJsonInput;
    use Redirect;
    use ResponseJson;
}
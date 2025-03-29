<?php
/**
 * EnvironmentHelper
 *
 * A collection of reusable environment-related helper methods using traits.
 * Includes Traits to check the current environment (development, production, testing)
 * and retrieve environment variables.
 *
 * @package     DanBaker\ToolBox
 * @author      Dan Baker
 * @license     MIT License
 * @link        https://github.com/danBaker/ToolBox
 */

 namespace DanBaker\ToolBox\Helpers;

use DanBaker\ToolBox\Traits\Environment\GetEnv;
use DanBaker\ToolBox\Traits\Environment\IsDevelopment;
use DanBaker\ToolBox\Traits\Environment\IsProduction;
use DanBaker\ToolBox\Traits\Environment\IsTesting;

class EnvironmentHelper
{
    use GetEnv;
    use IsDevelopment;
    use IsProduction;
    use IsTesting;
}
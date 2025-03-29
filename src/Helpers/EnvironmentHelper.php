<?php
/**
 * EnvironmentHelper
 *
 * A collection of reusable environment-related helper methods using traits.
 * Includes helpers to check the current environment (development, production, testing)
 * and retrieve environment variables.
 *
 * @package     DanBaker\ToolBox
 * @author      Dan Baker
 * @license     MIT License
 * @link        https://github.com/danBaker/ToolBox
 */

namespace DanBaker\ToolBox\Helpers;

use DanBaker\ToolBox\Helpers\Environment\GetEnvTrait;
use DanBaker\ToolBox\Helpers\Environment\IsDevelopmentTrait;
use DanBaker\ToolBox\Helpers\Environment\IsProductionTrait;
use DanBaker\ToolBox\Helpers\Environment\IsTestingTrait;

class EnvironmentHelper
{
    use GetEnvTrait;
    use IsDevelopmentTrait;
    use IsProductionTrait;
    use IsTestingTrait;
}
<?php
/**
 * SecurityHelper
 *
 * A collection of reusable security-related helper methods using traits.
 * Includes helpers to sanitize input, escape HTML, hash and verify passwords,
 * validate UUIDs and IP addresses, and generate secure tokens.
 *
 * @package     DanBaker\ToolBox
 * @author      Dan Baker
 * @license     MIT License
 * @link        https://github.com/danBaker/ToolBox
 */

namespace DanBaker\ToolBox\Helpers;

use DanBaker\ToolBox\Traits\Security\EscapeHtml;
use DanBaker\ToolBox\Traits\Security\GenerateToken;
use DanBaker\ToolBox\Traits\Security\HashPassword;
use DanBaker\ToolBox\Traits\Security\IsIpAddress;
use DanBaker\ToolBox\Traits\Security\IsUuid;
use DanBaker\ToolBox\Traits\Security\SanitizeInput;
use DanBaker\ToolBox\Traits\Security\VerifyPassword;

class SecurityHelper
{
    use EscapeHtml;
    use GenerateToken;
    use HashPassword;
    use IsIpAddress;
    use IsUuid;
    use SanitizeInput;
    use VerifyPassword;
}
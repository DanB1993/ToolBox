<?php

namespace DanBaker\ToolBox\Services;

use DanBaker\ToolBox\Traits\Security\EscapeHtml;
use DanBaker\ToolBox\Traits\Security\GenerateToken;
use DanBaker\ToolBox\Traits\Security\HashPassword;
use DanBaker\ToolBox\Traits\Security\IsIpAddress;
use DanBaker\ToolBox\Traits\Security\IsUuid;
use DanBaker\ToolBox\Traits\Security\SanitizeInput;
use DanBaker\ToolBox\Traits\Security\VerifyPassword;

class SecurityTools
{
    use EscapeHtml;
    use GenerateToken;
    use HashPassword;
    use IsIpAddress;
    use IsUuid;
    use SanitizeInput;
    use VerifyPassword;
}
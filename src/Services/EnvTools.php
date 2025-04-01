<?php

 namespace DanBaker\ToolBox\Services;

use DanBaker\ToolBox\Traits\Env\GetEnv;
use DanBaker\ToolBox\Traits\Env\IsDevelopment;
use DanBaker\ToolBox\Traits\Env\IsProduction;
use DanBaker\ToolBox\Traits\Env\IsTesting;

class EnvTools
{
    use GetEnv;
    use IsDevelopment;
    use IsProduction;
    use IsTesting;
}
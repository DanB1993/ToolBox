<?php

namespace DanBaker\ToolBox\Services;

use DanBaker\ToolBox\Traits\String\MaskString;
use DanBaker\ToolBox\Traits\String\Pluralize;
use DanBaker\ToolBox\Traits\String\RandomString;
use DanBaker\ToolBox\Traits\String\Singularize;
use DanBaker\ToolBox\Traits\String\Slugify;
use DanBaker\ToolBox\Traits\String\ToCamelCase;
use DanBaker\ToolBox\Traits\String\ToKebabCase;
use DanBaker\ToolBox\Traits\String\ToSnakeCase;
use DanBaker\ToolBox\Traits\String\Truncate;

class StringTools
{
    use MaskString;
    use Pluralize;
    use RandomString;
    use Singularize;
    use Slugify;
    use ToCamelCase;
    use ToKebabCase;
    use ToSnakeCase;
    use Truncate;
}
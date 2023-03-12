<?php

namespace Lib\Cli\Core;

use Lib\Cli\Commands\Set;

class Application
{
    public function __construct()
    {
        (new Set())->init();
    }
}

<?php

namespace Lib\Cli\Command;

use Lib\Cli\Core\Register;

class Set
{
    public function init()
    {
        Register::command("make",  [
            "migration"
        ]);
    }
};

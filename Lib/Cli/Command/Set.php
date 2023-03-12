<?php

namespace Lib\Cli\Commands;

use Lib\Cli\Core\Register;

class Set
{
    public function init()
    {
        Register::command("make",  [
            ["migration"]
        ]);
    }
};

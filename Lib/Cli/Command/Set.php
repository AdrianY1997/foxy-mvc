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

        Register::command("migration", [
            "start"
        ]);

        Register::command("server", [
            "start"
        ]);

        Register::command("database", [
            "create",
            "drop"
        ]);
    }
};

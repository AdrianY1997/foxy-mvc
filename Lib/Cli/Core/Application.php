<?php

namespace Lib\Cli\Core;

use Lib\Cli\Command\Set;
use Lib\Cli\Core\Register;

class Application
{
    public function __construct()
    {
        (new Set())->init();
    }

    public function run(array $argv)
    {
        [$cmd, $sub] = str_contains($argv[1], ":")
            ? explode(":", $argv[1])
            : [$argv[1], null];

        if (Register::checkCommand([$cmd, $sub])) {
            $cmd = ucfirst($cmd);
            $sub = ucfirst($sub);
            $commandFile = "Lib\\Cli\\Command\\$cmd\\$sub";

            (new $commandFile($argv[2]))->init();
        }
    }
}

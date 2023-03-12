<?php

namespace Lib\Cli\Core;

class Register
{
    static protected $commands = [];

    static function command(string $cmd, array $sub)
    {
        self::setCommand(["cmd" => $cmd, "sub" => $sub]);
    }

    static function setCommand(array $properties)
    {
        self::$commands[] = $properties;
    }
}

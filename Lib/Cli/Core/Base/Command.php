<?php

namespace Lib\Cli\Core\Base;

use Lib\Cli\Core\Printer;

class Command
{
    protected $property;
    protected $printer;

    public function __construct($property)
    {
        $this->property = $property;
        $printer = new Printer();
    }
}

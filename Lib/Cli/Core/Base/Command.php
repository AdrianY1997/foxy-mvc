<?php

namespace Lib\Cli\Core\Base;

class Command
{
    protected $property;
    public function __construct($property)
    {
        $this->property = $property;
    }
}

<?php

namespace Lib\Foxy\Core;

class Response
{
    protected $output;

    public function __construct($output)
    {
        $this->output = $output;
    }
    public function send()
    {
        print $this->output;
    }
}
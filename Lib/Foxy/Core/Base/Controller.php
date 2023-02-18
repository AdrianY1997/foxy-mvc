<?php

namespace Lib\Foxy\Core\Base;

use Lib\Foxy\Core\Session;
use Lib\Sly\Sly;

class Controller
{
    protected $engine;

    public function __construct()
    {
        $GLOBALS["messages"] = Session::getMessage();
        $this->engine = new Sly();
    }
}

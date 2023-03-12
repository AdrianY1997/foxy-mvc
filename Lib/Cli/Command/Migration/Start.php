<?php

namespace Lib\Cli\Command\Migration;

use Lib\Cli\Core\Base\Command;

class Start extends Command
{
    public function __construct($pro, $avs)
    {
        parent::__construct($pro, $avs);
        $this->init();
    }

    public function init()
    {
    }
}

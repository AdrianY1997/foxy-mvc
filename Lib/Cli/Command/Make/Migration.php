<?php

namespace Lib\Cli\Command\Make;

use Lib\Cli\Core\Base\Command;

class Migration extends Command
{
    public function __construct($pro)
    {
        parent::__construct($pro);
        $this->init();
    }

    public function init()
    {
    }
}

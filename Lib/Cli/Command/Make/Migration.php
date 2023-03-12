<?php

namespace Lib\Cli\Command\Make;

use Lib\Cli\Core\Base\Command;

class Migration extends Command
{
    public function __construct($pro, $avs)
    {
        parent::__construct($pro, $avs);
    }

    public function init()
    {
        $this->printer;
    }
}

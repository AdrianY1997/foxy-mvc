<?php

use Lib\Core\Application;
use Lib\Core\Autoloader;
use Lib\Util\DotEnv;


(new Autoloader());
(new DotEnv(constant("DIR") . '/.env'))->load();

return new Application();
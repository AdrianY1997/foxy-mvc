<?php

use Lib\Core\Application;
use Lib\Core\ServiceProvider;
use Lib\Util\DotEnv;


(new ServiceProvider())->init();
(new DotEnv(constant("DIR") . '/.env'))->load();

return new Application();
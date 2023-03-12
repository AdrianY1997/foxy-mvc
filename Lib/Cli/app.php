<?php

use Lib\Cli\Core\Application;
use Lib\Util\DotEnv;

define("VER", "Alpha-v0.1");

$dotenv = new DotEnv(constant("DIR") . '/.env');
$dotenv->load();

require_once constant("DIR") . "\\Config\\Database.php";

return new Application();

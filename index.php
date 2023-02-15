<?php

include_once "Lib/Util/helper.php";
include_once "Lib/Util/DotEnv.php";
include_once "Lib/Core/Autoloader.php";

define("DIR", __DIR__);

$app = require "Lib/app.php";

$app->handle();
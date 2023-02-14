<?php

require_once "Lib\\Cli\\Core\\Loader.php";

use Cli\Command\Create;
use Cli\Command\Serve;
use Cli\Core\App;
use Cli\Core\Loader;

(new Loader())->init();

define("VER", "[Alpha.0.1]");

$app = new App();

$app->registerCommand(
    "create",
    function (array $argv) use ($app) {
        (new Create($app, $argv));
    }
);

$app->registerCommand(
    "serve",
    function (array $argv) use ($app) {
        (new Serve($app, $argv));
    }
);

return $app;
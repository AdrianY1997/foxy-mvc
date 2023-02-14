<?php

namespace Lib\Core;

use App\Site\Controller\ErrorController;
use Lib\Core\Base\Controller;
use Lib\Core\Request;

class Application
{
    public function __construct()
    {

    }

    public function handle()
    {
        [$controller, $method, $param] = Request::getUrl();

        $controller = Controller::path($controller);

        if (!class_exists($controller)) {
            redirect("error/code/404");
        }

        $controller = new $controller();

        if (!method_exists($controller, $method))
            $controller->index();
        else
            $controller->{$method}($param);
    }

    public function terminate()
    {

    }
}
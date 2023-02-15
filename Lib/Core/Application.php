<?php

namespace Lib\Core;

use App\Model\Webdata;
use Lib\Core\Base\Controller;

class Application
{
    public function __construct()
    {
        Session::start();
        Webdata::initialView();
    }

    public function handle()
    {
        [$controller, $method, $param] = Request::getUrl();

        if (!$controller)
            redirect(constant("HOME"));

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
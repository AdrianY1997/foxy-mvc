<?php

namespace Lib\Core;

use App\Site\Controller\ErrorController;
use Exception;

class Redirector
{
    protected $route;
    protected $param;

    public function route($route, $param = [])
    {
        $this->route = $route;
        $this->param = $param;

        try {
            $url = $this->getUrlFromRoute($this->route);
            header("Location: $url");
            exit;
        } catch (Exception $e) {
            $this->handleError("page-not-found");
        }
    }

    protected function getUrlFromRoute($routeName)
    {

        if (isset($this->route)) {

            $router = Route::getRoute($routeName);

            $url = $router->getUrl() ?? "";

            if (!empty($this->param)) {
                foreach ($this->param as $key => $value) {
                    $url = str_replace("::$key", $value, $url);
                }
            }
            return $url;
        }

        throw new Exception("Ruta no encontrada: $routeName");
    }

    protected function handleError($msg)
    {
        // $controller = new ErrorController();
        // $controller->code($msg);

        redirect()->route("error", ["msg" => $msg]);
        exit;
    }
}
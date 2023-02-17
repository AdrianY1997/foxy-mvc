<?php

use Lib\Foxy\Core\Redirector;
use Lib\Foxy\Core\Route;

function asset($path)
{
    return constant("BASE_URL") . "Public/" . $path;
}

function resource($path)
{
    return constant("BASE_URL") . "App/Site/Resources/" . $path;
}

function render($view, $data = [])
{
    foreach (array_keys($data) as $e) {
        ${$e} = $data[$e];
    }

    include "App/Site/Resources/View/app.php";
}

function extend($view, $data = [])
{
    foreach (array_keys($data) as $e) {
        ${$e} = $data[$e];
    }
    return include "View/" . $view . ".php";
}

function route($name, $params = [])
{
    $router = Route::getRoute($name);
    $url = $router->getUrl() ?? "";

    foreach ($params as $key => $value) {
        $url = str_replace("{{$key}}", $value, $url);
    }

    return constant("BASE_URL") . $url;
}

function redirect()
{
    return new Redirector;
}
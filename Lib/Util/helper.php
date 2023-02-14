<?php
use Lib\Base\Controller;
use Lib\Core\Session;

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

function route($route)
{
    return constant("BASE_URL") . $route;
}

function redirect(string $route)
{
    return header("Location: " . constant("BASE_URL") . $route);
}
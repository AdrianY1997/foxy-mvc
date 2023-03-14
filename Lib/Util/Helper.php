<?php

if (class_exists("render")) {
    function render(string $path, array $variables)
    {
        extract($variables);

        include_once "Lib\\App\\Site\\Views\\app.base.php";
    }
}

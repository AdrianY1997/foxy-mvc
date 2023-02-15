<?php

use Lib\Core\Route;

Route::set("/", function () {
    redirect()->route("inicio");
});
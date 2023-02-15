<?php

use App\Site\Controller\ErrorController;
use Lib\Core\Route;

Route::set("error/:msg:", [ErrorController::class, "code"])->name("error");
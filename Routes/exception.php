<?php

use App\Site\Controller\ErrorController;
use Lib\Foxy\Core\Route;

Route::set("error/{msg}", [ErrorController::class, "code"])->name("error");
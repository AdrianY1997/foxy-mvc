<?php

use App\Site\Controller\HomeController;
use Lib\Foxy\Core\Route;

Route::set("", [HomeController::class, "index"])->name(constant("HOME"));
Route::set("testsly", [HomeController::class, "trySlyEngine"])->name("sly.test");
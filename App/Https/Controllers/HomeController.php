<?php

namespace App\Https\Controllers;

use Lib\Foxy\Core\Base\Controller;

class HomeController extends Controller
{
    public function home()
    {
        render("default/home");
    }
}
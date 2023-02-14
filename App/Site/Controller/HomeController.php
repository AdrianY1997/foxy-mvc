<?php

namespace App\Site\Controller;

use Lib\Core\Base\Controller;

class HomeController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        render("home");
    }
}
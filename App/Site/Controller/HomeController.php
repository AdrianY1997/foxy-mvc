<?php

namespace App\Site\Controller;

use Lib\Foxy\Core\Base\Controller;

class HomeController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        render("home");
    }

    public function trySlyEngine()
    {
        render("test", [
            "titulo" => "Test"
        ]);
    }
}
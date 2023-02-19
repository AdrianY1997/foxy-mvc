<?php

namespace App\Site\Controller;

use Lib\Foxy\Core\Base\Controller;

class ErrorController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function code($msg)
    {
        $messages = [
            "page-not-found" => ["404", "the page you are looking for might have been removed had its name changed or is temporarily unavailable"],
            "missing-permissions" => ["405", "the page you are trying to access needs additional user permissions, please contact the administrator to solve the problem."]
        ];

        [$code, $subtitle] = $messages[$msg];

        render("error", [
            "code" => $code,
            "title" => ucfirst(str_replace("-", " ", $msg)),
            "subtitle" => $subtitle
        ]);
    }
}

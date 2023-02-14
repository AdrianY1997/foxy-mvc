<?php

namespace Cli\Core;

class Printer
{
    public function __construct()
    {
        $this->display(null, ">> Foxy CLI >>");
        $this->nl();
    }

    public function out($msg)
    {
        echo $msg;
    }

    public function nl()
    {
        $this->out("\n");
    }

    public function display($type, $msg)
    {
        $this->colorLog($type, $msg);
        $this->nl();
    }

    public function colorLog($type, $str)
    {
        $c = 'd';

        switch ($type) {
            case "erro":
                $c = 'e';
                break;
            case "info":
                $c = 'i';
                break;
            case "succ":
                $c = 's';
                break;
            case "warn":
                $c = 'w';
                break;
        }

        $h = $type ? constant("VER") . "[$type] " : "";

        switch ($c) {
            case 'e': //error
                $this->out("\033[31m$h\033[0m $str");
                break;
            case 's': //success
                $this->out("\033[32m$h\033[0m $str");
                break;
            case 'w': //warning
                $this->out("\033[33m$h\033[0m $str");
                break;
            case 'i': //info
                $this->out("\033[36m$h\033[0m $str");
                break;
            case 'd': //white
                $this->out("\033[39m$h\033[0m $str");
                break;
        }
    }
}
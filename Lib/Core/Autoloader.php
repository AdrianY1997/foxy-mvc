<?php

namespace Lib\Core;

class Autoloader
{
    const LOADER_DIR = 'Lib/Util/Dict';

    public function __construct()
    {
        $this->loader();
    }

    private function loader()
    {
        spl_autoload_register(function ($class) {
            $file = $this->getClassFilePath($class);
            if ($file) {
                require_once $file;
            }
        });
    }

    private function getClassFilePath($class)
    {
        $file = $this->getFileNameFromClass($class);
        if (file_exists($file)) {
            return $file;
        }
        return false;
    }

    private function getFileNameFromClass($class)
    {
        $path = explode('\\', $class);
        $filename = array_pop($path);
        $filename = $filename . '.php';
        $path = implode(DIRECTORY_SEPARATOR, $path);
        return self::LOADER_DIR . DIRECTORY_SEPARATOR . $path . DIRECTORY_SEPARATOR . $filename;
    }
}
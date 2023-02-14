<?php

namespace Lib\Core\Base;

use App\Site\Controller\ErrorController;
use Lib\Core\Session;

class Controller
{
    public function __construct()
    {
        $GLOBALS["messages"] = Session::getMessage();
    }

    /** 
     * Crea la ruta del controlador en la carpeta `App\Site\Controller` 
     * 
     * En caso de no existir la ruta al controlador sera redirigido al controlador de errores
     * 
     * @param string $controller El nombre del controlador tomado de la `URL`
     * @return string Devuelve la ruta completa del controlador
     */
    static function path(string $controller): string
    {
        $path = join("\\", ["App", "Site", "Controller", ucfirst($controller) . "Controller"]);

        return $path;
    }
}
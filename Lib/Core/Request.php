<?php

namespace Lib\Core;

class Request
{
    public function __construct()
    {

    }

    /**
     * Obtiene todos los datos enviados atravez de `GET` y `POST`
     * @return array Retorna un `array` con todos los datos
     */
    static function getData()
    {
        $array = [$_GET, ...$_POST];

        return $array;
    }

    /**
     * Obtiene la url y subdivide para enviar al controlador
     * 
     * @return array Retorna un array con los datos tomados 
     * 
     * `controlador`, `metodo`, `parametros`
     */
    static function getUrl(): array
    {
        $URL = urldecode(constant("URL"));
        $length = strlen(constant("BASE_URL"));

        $url = substr_replace($URL, "", 0, $length);
        $url = explode("/", trim($url, "/"));

        $c = $url[0];
        $f = isset($url[1]) ? $url[1] : "";
        $p = isset($url[2]) ? $url[2] : "";

        if (!$c)
            redirect(getenv("HOME"));

        return [$c, $f, $p];
    }
}
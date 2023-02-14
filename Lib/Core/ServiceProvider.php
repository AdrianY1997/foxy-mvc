<?php

namespace Lib\Core;

class ServiceProvider
{
    /**
     * Inicializa los archivos para el funcionamiento de la aplicación
     * 
     * Los archivos son separados por categorias para prioridad y evitar conflictos
     */
    public function init(): void
    {
        self::config();
        self::base();
        self::core();
        self::model();
        self::controller();
    }

    /**
     * Listado con los archivos Base
     */
    private function base(): void
    {
        self::loader("Lib\\Util\\Dict\\base.json");
    }

    /**
     * Listado con los archivos de configuración
     */
    private function config(): void
    {
        self::loader("Lib\\Util\\Dict\\config.json");
    }

    /**
     * Listado con los archivos Core
     */
    private function core(): void
    {
        self::loader("Lib\\Util\\Dict\\core.json");
    }

    /**
     * Listado con los Modelos
     */
    private function model(): void
    {
        self::loader("Lib\\Util\\Dict\\model.json");
    }

    /**
     * Listado con los controladores
     */
    private function controller(): void
    {
        self::loader("Lib\\Util\\Dict\\controller.json");
    }

    /**
     * Carga un listado mediante `require_once`
     * 
     * @param string $path Ruta al archivo a cargar
     */
    private function loader(string $path): void
    {
        $json = file_get_contents($path);
        $json_data = json_decode($json, true);

        $list = $json_data[array_key_first($json_data)];

        foreach ($list as $key => $element) {
            require_once trim($element);
        }
    }
}
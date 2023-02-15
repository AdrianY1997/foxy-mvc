<?php

namespace Lib\Core;

class Route
{
    private string $url;
    private array|callable $action;
    private string $name;

    private static $routes = [];

    /**
     * Registra una nueva ruta
     * 
     * @param string $url Recibe una cadena con la ruta a la que ira el navegador
     * 
     * ejemplo: www.domain.com/inicio donde `inicio` es la `url`
     * 
     * @param array|callable $action Recibe un arreglo o una funcion anonima
     * 
     * `[array]`: El arreglo debe tener 2 elementos
     *
     * El primero es el controlador definido de la siguiente manera `ProfileController::class`
     * 
     * El segundo elemento es una cadena con el nombre de la funcion que se va a llamar por ejemplo: `edit`
     * 
     * `[callable]`: Tambien es posible recibir una funcion anonima con las instrucciones dadas directamente `function () { render("profile/edit") }`
     * 
     * Ejemplo con array: 
     * 
     * `Route::new("perfil/{id}/edit", [ProfileController::class, "edit"])->name("profile.edit")`
     * 
     * Ejemplo con callable: 
     * 
     * `Route::new("inicio", function () { render("home") })`
     * @return Route Devuelve una instancia de la clase `Route`
     */
    public static function set(string $url, array|callable $action): Route
    {
        $route = new self;
        $route->url = $url;
        $route->action = $action;

        return $route;
    }

    /**
     * Asigna un nombre a la ruta agregada
     * 
     * @param string $name Recibe una cadena con el nombre a asignar
     * 
     * @return Route Devuelve la instancia de `Route`
     */
    public function name($name): Route
    {
        $this->name = $name;
        self::$routes[$name] = $this;

        return $this;
    }

    /**
     * Busca y retorna una instancia de `Route` a partir del nombre asignado
     * 
     * @param string $name Recibe una cadena con el nombre de la ruta
     * 
     * @return Route Devuelve la instancia de la ruta nombrada
     */
    public static function getRoute($name): Route
    {
        return self::$routes[$name];
    }

    /**
     * Obtiene la url guardada en la instancia `Route`
     * 
     * @return string  
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * Obtiene el `array` o la `funcion` guardada en la instancia `Route`
     * 
     * @return array|callable  
     */
    public function getController(): array|callable
    {
        return $this->controller;
    }

    /**
     * Obtiene el nombre guardado en la instancia `Route`
     * 
     * @return string 
     */
    public function getName(): string
    {
        return $this->name;
    }
}
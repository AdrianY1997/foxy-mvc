<?php

namespace App\Site\Controller;

use Lib\Core\Base\Controller;

class ErrorController extends Controller
{
    public function __construct()
    {

    }

    /**
     * Si se intenta acceder a la ruta `www.domain.com/error`
     * Sera automaticamente redirigido a la pagina de acceso no autorizado
     * 
     * @return void
     */
    public function index(): void
    {
        redirect("error/code/405");
    }

    /**
     * Metodo de control de errores
     * 
     * @param string $error Cadena con el respectivo error para acceder a los mensajes
     * 
     * Codigos disponibles
     * 
     * Codigo `404`: Referente a una pagina inexistente
     * 
     * Codigo `405`: Referente a una pagina con permisos especificos
     */
    public function code(string $error): void
    {
        $messages = [
            "404" => ["page not found", "the page you are looking for might have been removed had its name changed or is temporarily unavailable"],
            "405" => ["Missing Permissions", "the page you are trying to access needs additional user permissions, please contact the administrator to solve the problem."]
        ];

        [$title, $subtitle] = $messages[$error];

        render("error", [
            "code" => $error,
            "title" => $title,
            "subtitle" => $subtitle
        ]);
    }
}
<?php

namespace Cli\Command;

class Create
{
    public function __construct($app, $argv)
    {
        $componente = isset($argv[2]) ? $argv[2] : "[empty]";
        $app->getPrinter()->display("info", "Obteniendo componente");

        if (!method_exists($this, $componente)) {
            $app->getPrinter()->display("warn", "Falta el componente a crear");
            $app->getPrinter()->display("warn", "Modo de uso:");
            $app->getPrinter()->display("warn", "$ php foxy create [componente] [name] ");
            $app->getPrinter()->display("erro", "Saliendo");
            $app->getPrinter()->nl();
            exit;
        }
        $app->getPrinter()->display("succ", "Componente: $componente");
        $this->{$argv[2]}($app, $argv);
    }

    public function controller($app, $argv)
    {
        $templatePath = "Lib\\Templates\\Controller.txt";
        $dict = "Lib\\Util\\Dict\\controller.json";

        $name = isset($argv[3]) ? $argv[3] : "empty";
        $app->getPrinter()->display("info", "Obteniendo Nombre");

        if ($name == "empty") {
            $app->getPrinter()->display("warn", "Falta el nombre del controlador");
            $app->getPrinter()->display("warn", "Modo de uso:");
            $app->getPrinter()->display("warn", "$ php foxy create controller [name]");
            $app->getPrinter()->display("erro", "Saliendo");
            $app->getPrinter()->nl();
            exit;
        }

        $app->getPrinter()->display("succ", "Nombre del controlador: $name");
        $app->getPrinter()->display("info", "Obteniendo plantilla de \"$templatePath\"");

        if (!is_file($templatePath)) {
            $app->getPrinter()->display("warn", "Hay un problema en la ruta de la plantilla");
            $app->getPrinter()->display("warn", "Contacte con el desarrollador");
            $app->getPrinter()->display("erro", "Saliendo");
            $app->getPrinter()->nl();
            exit;
        }

        $templateContent = file_get_contents($templatePath);

        if (!$templateContent) {
            $app->getPrinter()->display("warn", "No se pudo cargar la plantilla");
            $app->getPrinter()->display("warn", "Contacte con el desarrollador");
            $app->getPrinter()->display("erro", "Saliendo");
            $app->getPrinter()->nl();
            exit;
        }

        $replacement = ucfirst($name);
        $fileName = $replacement . "Controller.php";

        $controllerFolder = "App\\Site\\Controller";
        $componentPath = "$controllerFolder\\$fileName";

        if (file_exists($componentPath)) {
            $app->getPrinter()->display("warn", "Ya existe un controlador con este nombre");
            $app->getPrinter()->display("warn", "Intente de nuevo con un nombre diferente");
            $app->getPrinter()->display("erro", "Saliendo");
            $app->getPrinter()->nl();
            exit;
        }

        $app->getPrinter()->display("info", "Creando controlador en \"$componentPath\"");

        $templateContent = str_replace("{{controllerName}}", $replacement, $templateContent);

        $file = fopen($componentPath, "w");

        if (!$file) {
            $app->getPrinter()->display("warn", "No se ha podido crear el archivo");
            $app->getPrinter()->display("warn", "Contacte con el desarrollador");
            $app->getPrinter()->display("erro", "Saliendo");
            $app->getPrinter()->nl();
            exit;
        }

        $write = fwrite($file, $templateContent);

        if (!$write) {
            $app->getPrinter()->display("warn", "El archivo ha sido creado, pero no se pudo generar el contenido");
            $app->getPrinter()->display("warn", "Contacte con el desarrollador");
            $app->getPrinter()->display("erro", "Saliendo");
            $app->getPrinter()->nl();
            exit;
        }

        fclose($file);

        $app->getPrinter()->display("succ", "El controlador \"$componentPath\" ha sido creado correctamente");
        $app->getPrinter()->display("info", "Actualizando loaders \"$dict\"");

        $json = file_get_contents($dict);

        if (!$json) {
            $app->getPrinter()->display("warn", "No se pudo cargar el diccionario controller");
            $app->getPrinter()->display("warn", "Contacte con el desarrollador");
            $app->getPrinter()->display("erro", "Saliendo");
            $app->getPrinter()->nl();
            exit;
        }

        $json_data = json_decode($json, true);

        array_push($json_data["controller"], $componentPath);

        $put = file_put_contents($dict, json_encode($json_data, JSON_PRETTY_PRINT));

        if (!$put) {
            $app->getPrinter()->display("warn", "No se pudo actualizar el diccionario controller");
            $app->getPrinter()->display("warn", "Contacte con el desarrollador");
            $app->getPrinter()->display("erro", "Saliendo");
            $app->getPrinter()->nl();
            exit;
        }

        $app->getPrinter()->display("succ", "El diccionario $dict ha sido actualizado");
        $app->getPrinter()->display("succ", "Saliendo");
        $app->getPrinter()->nl();
        exit;
    }

    public function model($app, $argv)
    {
        $templatePath = "Lib\\Templates\\Model.txt";
        $dict = "Lib\\Util\\Dict\\model.json";

        $name = isset($argv[3]) ? $argv[3] : "empty";
        $app->getPrinter()->display("info", "Obteniendo Nombre");

        if ($name == "empty") {
            $app->getPrinter()->display("warn", "Falta el nombre del modelo");
            $app->getPrinter()->display("warn", "Modo de uso:");
            $app->getPrinter()->display("warn", "$ php foxy create controller [name]");
            $app->getPrinter()->display("erro", "Saliendo");
            $app->getPrinter()->nl();
            exit;
        }

        $app->getPrinter()->display("succ", "Nombre del modelo: $name");
        $app->getPrinter()->display("info", "Obteniendo plantilla de \"$templatePath\"");

        if (!is_file($templatePath)) {
            $app->getPrinter()->display("warn", "Hay un problema en la ruta de la plantilla");
            $app->getPrinter()->display("warn", "Contacte con el desarrollador");
            $app->getPrinter()->display("erro", "Saliendo");
            $app->getPrinter()->nl();
            exit;
        }

        $templateContent = file_get_contents($templatePath);

        if (!$templateContent) {
            $app->getPrinter()->display("warn", "No se pudo cargar la plantilla");
            $app->getPrinter()->display("warn", "Contacte con el desarrollador");
            $app->getPrinter()->display("erro", "Saliendo");
            $app->getPrinter()->nl();
            exit;
        }

        $replacement = ucfirst($name);
        $fileName = $replacement . ".php";

        $controllerFolder = "App\\Model";
        $componentPath = "$controllerFolder\\$fileName";

        if (file_exists($componentPath)) {
            $app->getPrinter()->display("warn", "Ya existe un modelo con este nombre");
            $app->getPrinter()->display("warn", "Intente de nuevo con un nombre diferente");
            $app->getPrinter()->display("erro", "Saliendo");
            $app->getPrinter()->nl();
            exit;
        }

        $app->getPrinter()->display("info", "Creando modelo en \"$componentPath\"");

        $templateContent = str_replace("{{modelName}}", $replacement, $templateContent);
        $templateContent = str_replace("{{tableName}}", strtolower($replacement), $templateContent);

        $file = fopen($componentPath, "w");

        if (!$file) {
            $app->getPrinter()->display("warn", "No se ha podido crear el archivo");
            $app->getPrinter()->display("warn", "Contacte con el desarrollador");
            $app->getPrinter()->display("erro", "Saliendo");
            $app->getPrinter()->nl();
            exit;
        }

        $write = fwrite($file, $templateContent);

        if (!$write) {
            $app->getPrinter()->display("warn", "El archivo ha sido creado, pero no se pudo generar el contenido");
            $app->getPrinter()->display("warn", "Contacte con el desarrollador");
            $app->getPrinter()->display("erro", "Saliendo");
            $app->getPrinter()->nl();
            exit;
        }

        fclose($file);

        $app->getPrinter()->display("succ", "El modelo \"$componentPath\" ha sido creado correctamente");
        $app->getPrinter()->display("info", "Actualizando loaders \"$dict\"");

        $json = file_get_contents($dict);

        if (!$json) {
            $app->getPrinter()->display("warn", "No se pudo cargar el diccionario model");
            $app->getPrinter()->display("warn", "Contacte con el desarrollador");
            $app->getPrinter()->display("erro", "Saliendo");
            $app->getPrinter()->nl();
            exit;
        }

        $json_data = json_decode($json, true);

        array_push($json_data["model"], $componentPath);

        $put = file_put_contents($dict, json_encode($json_data, JSON_PRETTY_PRINT));

        if (!$put) {
            $app->getPrinter()->display("warn", "No se pudo actualizar el diccionario model");
            $app->getPrinter()->display("warn", "Contacte con el desarrollador");
            $app->getPrinter()->display("erro", "Saliendo");
            $app->getPrinter()->nl();
            exit;
        }

        $app->getPrinter()->display("succ", "El diccionario $dict ha sido actualizado");
        $app->getPrinter()->display("succ", "Saliendo");
        $app->getPrinter()->nl();
        exit;
    }
}
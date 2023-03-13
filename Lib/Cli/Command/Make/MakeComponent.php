<?php

namespace Lib\Cli\Command\Make;

use Exception;
use Lib\Cli\Core\Base\Command;

class MakeComponent extends Command
{
    public function __construct($pro, $avs)
    {
        parent::__construct($pro, $avs);
    }

    public function make()
    {
        $names = [
            "controller" => "controlador",
            "model" => "modelo",
            "migration" => "migracion"
        ];

        $templatesFolder = "Lib\Util\Templates";
        $component = $this->property["sub"];
        $componentEs = $names[$component];
        $componentName = $this->options["--name"] ?? $this->options["--n"] ?? null;

        $this->printer->display("info", "Iniciando creación de [$componentEs]");
        $this->printer->display("info", "Obteniendo nombre de [$componentEs]");

        if (!$componentName) {
            $this->printer->error(
                "El nombre de [$componentEs] no ha sido definido",
                "Modo de uso: $ php foxy make:$component [ --name | --n ] [nombre]"
            );
        }

        $this->printer->display("succ", "Nombre de [$componentEs] obtenido: " . ucfirst($componentName));

        $componentTemplateFile = "$templatesFolder/make-$component.template.php";
        $this->printer->display("info", "Obteniendo plantilla de [$componentEs] en \"$componentTemplateFile\"");

        $templateContent = file_get_contents($componentTemplateFile);

        if (!$templateContent) {
            $this->printer->error(
                "No se ha podido cargar la plantilla",
                "Contacte con el desarrollador",
            );
        }

        $this->printer->display("succ", "La plantilla de [$componentEs] ha sido cargada");
    }
}

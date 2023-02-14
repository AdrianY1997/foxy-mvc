<?php

namespace Lib\Core;

use PDO;
use PDOException;

class Database
{
    private $host;
    private $name;
    private $user;
    private $pass;
    private $port;
    private $chst;

    function __construct()
    {
        $this->host = constant('DBHOST');
        $this->name = constant('DBNAME');
        $this->user = constant('DBUSER');
        $this->pass = constant('DBPASS');
        $this->port = constant("DBPORT");
        $this->chst = constant("DBCHST");
    }

    /**
     * Realiza la conexión a la base de datos
     * 
     * @return PDO|string Retorna la conexión a la base de datos o Imprime una excepción
     */
    function connect(): PDO|string
    {
        try {
            $connection = "mysql:host=" . $this->host . ";dbname=" . $this->name . ";port=" . $this->port . ";charset=" . $this->chst;
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];

            $pdo = new PDO($connection, $this->user, $this->pass, $options);

            return $pdo;
        } catch (PDOException $e) {
            return print_r('Error connection: ' . $e->getMessage());
        }
    }
}
<?php

namespace Lib\Foxy\Core;

use PDO;
use PDOException;

class Database
{
    protected $host;
    protected $name;
    protected $user;
    protected $pass;

    protected $port;
    protected $chst;

    protected $pdo;

    static protected $connections = [];

    public function __construct($opt = [])
    {
        $dsn = "mysql:dbname=" . $opt["dbname"] ?? $this->name . ";host=" . $opt["dbhost"] ?? $this->host . ";port=" . $opt["dbport"] ?? $this->port . ";charset=" . $opt["dbchst"] ?? $this->chst;
        try {
            $this->pdo = new PDO($dsn, $this->user, $this->pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            self::$connections[] = $this->pdo;
        } catch (PDOException $e) {
            die("Error connecting to database: " . $e->getMessage());
        }
    }

    public function getPdo(): PDO
    {
        return $this->pdo;
    }
}

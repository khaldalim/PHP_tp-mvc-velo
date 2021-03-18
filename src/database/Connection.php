<?php

namespace App\database;

use PDO;

class Connection
{

    const DB_HOST = "localhost";
    const DB_USER = "root";
    const DB_PASSWORD = "";
    const DB_NAME = "tp_mvc_velo";

    static public function getPdo()
    {
        $pdo = new PDO("mysql:host=" . self::DB_HOST .
            ";dbname=" . self::DB_NAME . ";charst=utf8",
            self::DB_USER,
            self::DB_PASSWORD);
        return $pdo;
    }


}

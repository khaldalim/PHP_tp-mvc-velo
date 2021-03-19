<?php

namespace App\database;

use PDO;

class Connection
{

    static private $pdo;

    const DB_HOST = "localhost";
    const DB_USER = "root";
    const DB_PASSWORD = "";
    const DB_NAME = "tp_mvc_velo";

    static public function getPdo()
    {
        if(self::$pdo == null){
            self::$pdo = new PDO("mysql:host=" . self::DB_HOST .
                ";dbname=" . self::DB_NAME . ";charst=utf8",self::DB_USER,
                self::DB_PASSWORD);
        }

        return self::$pdo;
    }


}

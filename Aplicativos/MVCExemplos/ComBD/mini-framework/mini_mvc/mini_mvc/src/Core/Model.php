<?php

declare(strict_types = 1);

namespace Mvc\Core;
use PDO;

class Model
{
    public $db = null;
    function __construct()
    {
        try {
            self::openDatabaseConnection();
        } catch (\PDOException $e) {
            exit('Erro ao conectar ao banco de dados.');
        }
    }

    private function openDatabaseConnection()
    {
        $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);

		$dsn = DB_TYPE . ':host=' . DB_HOST . ';port ='. DB_PORT . ';dbname=' . DB_NAME;// . $databaseEncodingenc;
        $this->db = new PDO($dsn , DB_USER, DB_PASS, $options);
    }
}


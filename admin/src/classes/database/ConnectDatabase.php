<?php

namespace App\Admin\Database;

use PDO;

class ConnectDatabase
{
    private $pdo;

    public function __construct()
    {
        $this->connect();
    }

    /**
     * Получение подключения к базе данных
     * @return object
     */
    public function getConnect(): object
    {
        return $this->pdo;
    }

    /**
     * Покдлючение к базе данных
     * @return void
     */
    private function connect(): void
    {
        $conf = require_once(__DIR__ . DIRECTORY_SEPARATOR . '../../../config/configDb.php');

        $dsn = "mysql:host={$conf['host']};dbname={$conf['dbname']};charset=utf8";

        $options = [
            PDO::ATTR_ERRMODE =>            PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];

        try{
            $this->pdo = new PDO($dsn, $conf['user'], $conf['password'], $options);
        }catch (\PDOException $ex){
            exit($ex->getMessage());
        }
    }
}

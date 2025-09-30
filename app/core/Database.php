<?php

namespace App\Core;

class Database{

    private $connection;
    private static $instance = null;


    private function __construct()
    {
        $this->connect();
    }
    
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self(); // new Database();
        }
        return self::$instance;
    }

    public function connect()
    {
        $dbConfig = config('db');

        $dsn = "mysql:host={$dbConfig['host']};dbname={$dbConfig['dbname']};charset={$dbConfig['charset']}";
        $options = [
            \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ,
        ];

        try {
            $this->connection = new \PDO($dsn, $dbConfig['username'], $dbConfig['password'], $options);
            return true;
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public function fetch($sql, $params = [])
    {
        $stmt = $this->query($sql, $params);
        return $stmt->fetch();
    }

    public function fetchAll($sql, $params = [])
    {
        $stmt = $this->query($sql, $params);
        return $stmt->fetchAll();
    }

    public function execute($sql, $params = [])
    {
        $stmt = $this->query($sql, $params);
        return $stmt->rowCount();
    }

    public function lastInsertId()
    {
        return $this->connection->lastInsertId();
    }

    public function rowCount($sql, $params = [])
    {
        return $this->connection->rowCount();
    }

    public function query($sql, $params = [])
    {
        try{
            $stmt = $this->connection->prepare($sql);
            $stmt->execute($params);
            return $stmt;
        } catch (\PDOException $e) {
            throw new \PDOException("Erro de consulta ao BD" . $e->getMessage());
        }
    }
}
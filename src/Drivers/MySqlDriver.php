<?php
namespace IcoaraciDB\Drivers;

use IcoaraciDB\Interface\DriverInterface;
use PDO;

class MySqlDriver implements DriverInterface {
    private $pdo;

    public function connect(array $config) {
        $dsn = "mysql:host={$config['host']};dbname={$config['db']};charset=utf8mb4";
        $this->pdo = new PDO($dsn, $config['user'], $config['pass'], [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query(string $sql, array $params = []) {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }

    // Os outros métodos (insert, update, delete) viriam aqui...
}

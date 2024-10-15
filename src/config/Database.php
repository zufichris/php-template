<?php

namespace App\Config;

class Database
{
    private \PDO $pdo;

    public function __construct(string $host, string $dbName, string $username, string $password)
    {
        try {
            $this->pdo = new \PDO(dsn: "mysql:host=$host;dbname=$dbName", username: $username, password: $password);
            $this->pdo->setAttribute(attribute: \PDO::ATTR_ERRMODE, value: \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            throw new \Exception(message: "Database connection failed: " . $e->getMessage());
        }
    }
    public function getConnection(): \PDO
    {
        return $this->pdo;
    }
}
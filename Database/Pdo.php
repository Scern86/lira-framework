<?php

namespace Lira\Framework\Database;

class Pdo implements Database
{
    protected \PDO $databaseObject;
    public function __construct(string $database,string $user,string $password,string $host='127.0.0.1',int $port=5432)
    {
        $dsn = "pgsql:host={$host};port={$port};dbname={$database}";
        $this->databaseObject = new \PDO($dsn, $user, $password);
    }
    public function getDatabaseObject(): \PDO
    {
        return $this->databaseObject;
    }
}
<?php

namespace Lira\Framework\Database;

class PdoAdapter implements \Lira\Framework\Database\DatabaseInterface
{
    protected ?\PDO $pdo = null;

    public function __construct(
        private string $database,
        private string $user,
        private string $password,
        private string $host = '127.0.0.1',
        private int    $port = 5432
    )
    {
    }

    public function init(): void
    {
        if (is_null($this->pdo)) {
            $dsn = "pgsql:host={$this->host};port={$this->port};dbname={$this->database}";
            $this->pdo = new \PDO($dsn, $this->user, $this->password);
        }
    }

    public function connect(): ?\PDO
    {
        return $this->pdo;
    }
}
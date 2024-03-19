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
        try{
            if (is_null($this->pdo)) {
                $dsn = "pgsql:host={$this->host};port={$this->port};dbname={$this->database}";
                $this->pdo = new \PDO($dsn, $this->user, $this->password);
            }
        }catch (\Throwable $e){
            trigger_error("Create PDO. Exception {$e->getMessage()}");
        }
    }

    public function connect(): ?\PDO
    {
        try{
            return $this->pdo;
        }catch (\Throwable $e){
            trigger_error("Return PDO. Exception {$e->getMessage()}");
        }
        return null;
    }
}
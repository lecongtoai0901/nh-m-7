<?php
namespace App;

class Database
{
    private static $instance = null;
    private $conn;
    private $config;

    private function __construct($config)
    {
        $this->config = $config;
        $this->connect();
    }

    private function connect()
    {
        $cfg = $this->config['mssql'];
        $dsn = "sqlsrv:Server={$cfg['host']},{$cfg['port']};Database={$cfg['database']}";
        try {
            $this->conn = new \PDO($dsn, $cfg['user'], $cfg['pass'], [
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
            ]);
        } catch (\PDOException $e) {
            error_log("Database connection failed: " . $e->getMessage());
            $this->conn = null;
        }
    }

    public static function getInstance($config)
    {
        if (self::$instance === null) {
            self::$instance = new self($config);
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->conn;
    }

    public function isConnected()
    {
        return $this->conn !== null;
    }
}

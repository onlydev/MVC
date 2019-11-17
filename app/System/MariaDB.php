<?php
namespace Onlydev\System;

use PDO;
use PDOException;

class MariaDB
{
    /**
     * @var PDO
     */
    private $conn = NULL;
    
    public function __construct()
    {
        $host = getenv('DB_HOST');
        $port = getenv('DB_PORT');
        $db   = getenv('DB_DATABASE');
        $user = getenv('DB_USERNAME');
        $pass = getenv('DB_PASSWORD');
        
        try {
            $this->conn = new PDO(
                "mysql:host={$host};port={$port};charset=utf8;dbname={$db}",
                $user,
                $pass
            );
            $this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            exit('Connection Error : '.$exception->getMessage());
        }
    }
    
    public function getConnection()
    {
        return $this->conn;
    }
    
    public function __destruct()
    {
        $this->conn = NULL;
    }
}
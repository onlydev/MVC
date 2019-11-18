<?php
namespace Onlydev\Models;

use PDO;
use PDOException;
use Onlydev\System\MariaDB;

class TestModel
{
    public function findId($data): void
    {
        $db = MariaDB::getInstance();
        
        try {
            $qry = 'SELECT * FROM `test` WHERE `id`=:id';
    
            $stmt = $db->conn->prepare($qry);
            $stmt->bindParam(':id', $data['id'], PDO::PARAM_INT);
            $stmt->execute();
            
            // 결과 리턴하기
            //$stmt->fetch...
            
        } catch(PDOException $exception) {
            $return = [
                'Status' => 'ERROR',
                'Code' => $exception->getCode(),
                'Body' => $exception->getMessage()
            ];
            die($return);
        }
    }
}
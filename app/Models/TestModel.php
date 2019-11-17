<?php
namespace Onlydev\Models;

use PDOException;

class TestModel
{
    private $db = NULL;
    
    public function __construct($db)
    {
        $this->db = $db;
    }
    
    public function findAll($id)
    {
        $statement = 'SELECT * FROM `test` WHERE `id`=:id';
        
        try {
            $statement = $this->db->prepare($statement);
            $statement->execute([
                'id' => $id
            ]);
        } catch(PDOException $exception) {
            exit($exception->getMessage());
        }
    }
}
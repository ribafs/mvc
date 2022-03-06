<?php

namespace App;

class Model extends Connection
{
    public function getRows(){
        $conn = new Connection();
        try{             
            $stmt = $conn->pdo->query('SELECT id, name, email FROM customers');
            $execute = $stmt->execute();
            return $stmt->fetchAll(); // Será recebido pelo controller   
        }catch(PDOException $e){
            throw new Exception($e->getMessage());
        }       
    }

}

